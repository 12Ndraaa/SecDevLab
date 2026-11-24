<?php

namespace App\Services;

class PageLocalization
{
    /** @var array<string, array<string, mixed>> */
    private static array $cache = [];

    public static function clearRuntimeCache(): void
    {
        self::$cache = [];
    }

    public static function shouldUseIndonesian(?string $locale = null): bool
    {
        return ($locale ?? app()->getLocale()) === 'id';
    }

    public static function translateTopicNavHtml(string $categoryId, string $html, ?string $locale = null): string
    {
        if (! self::shouldUseIndonesian($locale) || trim($html) === '') {
            return $html;
        }

        $dict = self::loadNavDictionary($categoryId);
        $dict = array_merge(self::loadFile('_common.php'), $dict);

        return self::translateAsideBlock($html, $dict);
    }

    public static function translateRenderedHtml(string $viewName, string $html, ?string $locale = null): string
    {
        if (! self::shouldUseIndonesian($locale) || trim($html) === '') {
            return $html;
        }

        $topic = self::topicForView($viewName);
        $dict = self::buildDictionaryForTopic($topic, $viewName);

        // 1. Translate <title>...</title> while preserving brand suffix
        $titleDict = array_merge(self::loadFile('_titles.php'), $dict);
        $html = preg_replace_callback('/<title>(.*?)<\/title>/is', static function (array $m) use ($titleDict): string {
            return '<title>'.self::translatePageTitle($m[1], $titleDict).'</title>';
        }, $html, 1) ?? $html;

        // 2. Isolate <div class="vla-learning-content"> body so layout chrome stays untouched
        $startMarker = '<div class="vla-learning-content">';
        $endMarker = "\n<footer class=\"vla-footer";
        $startPos = strpos($html, $startMarker);
        $endPos = $startPos !== false ? strpos($html, $endMarker, $startPos) : false;

        if ($startPos !== false && $endPos !== false) {
            $bodyStart = $startPos + strlen($startMarker);
            // Exclude closing </div>\n</div> wrapper right before <footer
            $closeDivPos = strrpos(substr($html, 0, $endPos), '</div>');
            $outerClosePos = $closeDivPos !== false ? strrpos(substr($html, 0, $closeDivPos), '</div>') : false;
            $bodyEnd = $outerClosePos !== false && $outerClosePos > $bodyStart ? $outerClosePos : $endPos;

            $prefix = substr($html, 0, $bodyStart);
            $body = substr($html, $bodyStart, $bodyEnd - $bodyStart);
            $suffix = substr($html, $bodyEnd);

            return $prefix.self::translateBodyHtml($body, $dict).$suffix;
        }

        return self::translateBodyHtml($html, $dict);
    }

    private static function translateBodyHtml(string $body, array $dict): string
    {
        $protected = [];
        $protect = static function (string $snippet) use (&$protected): string {
            $key = "\x00BLK_".count($protected)."\x00";
            $protected[$key] = $snippet;

            return $key;
        };

        // Protect code/pre, SVG graphics, iframes, YouTube embeds, and dynamic Academy widgets
        $protectPatterns = [
            '/<pre\b[^>]*>(?:[^<]++|<(?!\/pre\b))*+<\/pre>/is',
            '/<code\b[^>]*>(?:[^<]++|<(?!\/code\b))*+<\/code>/is',
            '/<svg\b[^>]*>.*?<\/svg>/is',
            '/<iframe\b[^>]*>.*?<\/iframe>/is',
            '/<div\b[^>]*class="[^"]*\byoutube-wrapper\b[^"]*"[^>]*>.*?<\/div>/is',
            '/<div\b[^>]*class="[^"]*\bwidgetcontainer-lab-link\b[^"]*"[^>]*>(?:<div\b[^>]*>.*?<\/div>|[^<]++|<(?!\/div\b))*<\/div>/is',
            '/<div\b[^>]*class="[^"]*\bwidget-container-lab-page-status\b[^"]*"[^>]*>(?:<div\b[^>]*>.*?<\/div>|[^<]++|<(?!\/div\b))*<\/div>/is',
            '/<div\b[^>]*id="MysteryLabWidget"[^>]*>.*?<\/form>\s*<\/div>/is',
        ];
        foreach ($protectPatterns as $pat) {
            $body = preg_replace_callback($pat, static fn (array $m): string => $protect($m[0]), $body) ?? $body;
        }

        // Translate topic sidebar <aside class="nav-lhs">...</aside>
        $body = preg_replace_callback(
            '/<aside\b[^>]*class="[^"]*\bnav-lhs\b[^"]*"[^>]*>.*?<\/aside>/is',
            static fn (array $m): string => self::translateAsideBlock($m[0], $dict),
            $body
        ) ?? $body;

        // Translate sticky side menus (<div class="sticky-side-menu-white">...<aside>...</aside>)
        $body = preg_replace_callback(
            '/<aside\b(?![^>]*class="[^"]*\bnav-lhs\b)[^>]*>.*?<\/aside>/is',
            static fn (array $m): string => self::translateAsideBlock($m[0], $dict),
            $body
        ) ?? $body;

        // Translate breadcrumbs
        $body = preg_replace_callback(
            '/<(ul|ol)\b[^>]*class="[^"]*(?:breadcrumb-list|ps-breadcrumbs)[^"]*"[^>]*>.*?<\/\1>/is',
            static function (array $m) use ($dict): string {
                return preg_replace_callback(
                    '/(<span\b[^>]*itemprop="name"[^>]*>)((?:[^<]++|<(?!\/span\b))*+)(<\/span>)/is',
                    static fn (array $s): string => $s[1].self::translateInline($s[2], $dict).$s[3],
                    $m[0]
                ) ?? $m[0];
            },
            $body
        ) ?? $body;

        // Learning-path progress ratio text e.g. "0 of 51" -> "0 dari 51"
        $body = preg_replace_callback(
            '/(<span\b[^>]*class="[^"]*(?:expandable-progress-container-summary-amount|heading-navy-1)[^"]*"[^>]*>\s*)(\d+)\s+of\s+(\d+)(\s*<\/span>)/is',
            static fn (array $m): string => $m[1].$m[2].' dari '.$m[3].$m[4],
            $body
        ) ?? $body;

        // Headings h1..h6
        $body = preg_replace_callback(
            '/<h([1-6])(\b[^>]*)>((?:[^<]++|<(?!\/?h\1\b))*+)<\/h\1>/is',
            static fn (array $m): string => '<h'.$m[1].$m[2].'>'.self::translateInline($m[3], $dict).'</h'.$m[1].'>',
            $body
        ) ?? $body;

        // Leaf table headers and cells (allowing nested inline tags like <strong><a>...</a></strong>)
        $body = preg_replace_callback(
            '/<t([hd])(\b[^>]*)>((?:[^<]++|<(?!\/?(?:t[hd]|table|p|div)\b))*+)<\/t\1>/is',
            static fn (array $m): string => '<t'.$m[1].$m[2].'>'.self::translateTableCell($m[3], $dict).'</t'.$m[1].'>',
            $body
        ) ?? $body;

        // Paragraphs (leaf or with inline tags like <span class="label"> + <a>)
        $body = preg_replace_callback(
            '/<p(\b[^>]*)>((?:[^<]++|<(?!\/?(?:p|div|table|ul|ol|blockquote)\b))*+)<\/p>/is',
            static fn (array $m): string => '<p'.$m[1].'>'.self::translateParagraph($m[2], $dict).'</p>',
            $body
        ) ?? $body;

        // Leaf list items (no nested ul/ol/p/div)
        $body = preg_replace_callback(
            '/<li(\b[^>]*)>((?:[^<]++|<(?!\/?(?:li|ul|ol|p|div)\b))*+)<\/li>/is',
            static fn (array $m): string => '<li'.$m[1].'>'.self::translateInline($m[2], $dict).'</li>',
            $body
        ) ?? $body;

        // Other prose elements: summary, figcaption, dt, dd, leaf blockquote
        foreach (['summary', 'figcaption', 'dt', 'dd', 'blockquote'] as $tag) {
            $body = preg_replace_callback(
                '/<'.$tag.'(\b[^>]*)>((?:[^<]++|<(?!\/?(?:'.$tag.'|p|div|h[1-6])\b))*+)<\/'.$tag.'>/is',
                static fn (array $m): string => '<'.$tag.$m[1].'>'.self::translateInline($m[2], $dict).'</'.$tag.'>',
                $body
            ) ?? $body;
        }

        // Standalone labels, card buttons, and chevrons
        $body = preg_replace_callback(
            '/<div(\b[^>]*class="[^"]*\bchevron-after\b[^"]*"[^>]*)>((?:[^<]++|<(?!\/?div\b))*+)<\/div>/is',
            static fn (array $m): string => '<div'.$m[1].'>'.self::translateInline($m[2], $dict).'</div>',
            $body
        ) ?? $body;

        $body = preg_replace_callback(
            '/<sup(\b[^>]*)>((?:[^<]++|<(?!\/?sup\b))*+)<\/sup>/is',
            static fn (array $m): string => '<sup'.$m[1].'>'.self::translateInline($m[2], $dict).'</sup>',
            $body
        ) ?? $body;

        $body = preg_replace_callback(
            '/<span(\b[^>]*class="[^"]*\blabel\b[^"]*"[^>]*)>((?:[^<]++|<(?!\/?span\b))*+)<\/span>/is',
            static fn (array $m): string => '<span'.$m[1].'>'.self::translateInline($m[2], $dict).'</span>',
            $body
        ) ?? $body;

        // Standalone anchor CTAs/links not already handled inside <p>/<li>/<td>/<h*>
        $body = preg_replace_callback(
            '/<a(\b[^>]*)>((?:[^<]++|<(?!\/?(?:a|div|h[1-6]|p|li|td|th)\b))*+)<\/a>/is',
            static fn (array $m): string => '<a'.$m[1].'>'.self::translateInline($m[2], $dict).'</a>',
            $body
        ) ?? $body;

        // Restore protected blocks in reverse order (handles nested code inside widgets if any)
        if (! empty($protected)) {
            $body = strtr($body, $protected);
            $body = strtr($body, $protected);
        }

        return $body;
    }

    private static function translateAsideBlock(string $asideHtml, array $dict): string
    {
        $asideHtml = preg_replace_callback(
            '/<h([1-6])(\b[^>]*)>((?:[^<]++|<(?!\/?h\1\b))*+)<\/h\1>/is',
            static fn (array $m): string => '<h'.$m[1].$m[2].'>'.self::translateInline($m[3], $dict).'</h'.$m[1].'>',
            $asideHtml
        ) ?? $asideHtml;

        $asideHtml = preg_replace_callback(
            '/<a(\b[^>]*)>((?:[^<]++|<(?!\/?a\b))*+)<\/a>/is',
            static function (array $m) use ($dict): string {
                $inner = $m[2];
                // Preserve leading icon span inside nav-back
                if (preg_match('/^(\s*<span\b[^>]*class="[^"]*icon-[^"]*"[^>]*><\/span>\s*)(.+)$/is', $inner, $sm)) {
                    $translated = self::translateInline($sm[2], $dict);

                    return '<a'.$m[1].'>'.$sm[1].$translated.'</a>';
                }

                return '<a'.$m[1].'>'.self::translateInline($inner, $dict).'</a>';
            },
            $asideHtml
        ) ?? $asideHtml;

        return $asideHtml;
    }

    private static function translateTableCell(string $inner, array $dict): string
    {
        $direct = self::translateInline($inner, $dict);
        if ($direct !== $inner) {
            return $direct;
        }

        // Many TOC rows are <strong><a href="...">Title</a></strong>
        if (preg_match('/^\s*<strong>\s*(<a\b[^>]*>)(.*?)<\/a>\s*<\/strong>\s*$/is', $inner, $m)) {
            $translated = self::translateInline($m[2], $dict);

            return '<strong>'.$m[1].$translated.'</a></strong>';
        }
        if (preg_match('/^\s*(<a\b[^>]*>)(.*?)<\/a>\s*$/is', $inner, $m)) {
            $translated = self::translateInline($m[2], $dict);

            return $m[1].$translated.'</a>';
        }

        return $inner;
    }

    private static function translateParagraph(string $inner, array $dict): string
    {
        $direct = self::translateInline($inner, $dict);
        if ($direct !== $inner) {
            return $direct;
        }

        // Learning-path summary headers: "<strong>Title</strong> <span></span> <span class='expandable-progress-container-summary-amount'>0 dari 1</span>"
        if (preg_match('/^(\s*<strong>)(.*?)(<\/strong>\s*(?:<span\b[^>]*>\s*<\/span>\s*)?<span\b[^>]*class="[^"]*\bexpandable-progress-container-summary-amount\b[^"]*"[^>]*>.*?<\/span>\s*)$/is', $inner, $m)) {
            $translatedTitle = self::translateInline($m[2], $dict);

            return $m[1].$translatedTitle.$m[3];
        }

        // Learning-path checklist rows: "Title <span class='label...'>APPRENTICE</span> <a ...>Get started</a>"
        if (preg_match('/^(\s*)(.*?)(\s*<span\b[^>]*class="[^"]*\blabel\b[^"]*"[^>]*>.*?<\/span>.*?)(\s*)$/is', $inner, $m)) {
            $head = trim($m[2], " \t\n\r\v");
            $tail = $m[3];
            $translatedHead = $head !== '' ? self::translateInline($head, $dict) : $head;
            $tail = preg_replace_callback(
                '/<a(\b[^>]*)>((?:[^<]++|<(?!\/?a\b))*+)<\/a>/is',
                static fn (array $am): string => '<a'.$am[1].'>'.self::translateInline($am[2], $dict).'</a>',
                $tail
            ) ?? $tail;
            $tail = preg_replace_callback(
                '/<span(\b[^>]*class="[^"]*\blabel\b[^"]*"[^>]*)>((?:[^<]++|<(?!\/?span\b))*+)<\/span>/is',
                static fn (array $sm): string => '<span'.$sm[1].'>'.self::translateInline($sm[2], $dict).'</span>',
                $tail
            ) ?? $tail;

            return $m[1].$translatedHead.$tail.$m[4];
        }

        return $inner;
    }

    public static function translateInline(string $innerHtml, array $dict): string
    {
        $trimmed = trim($innerHtml, " \t\n\r\v");
        if ($trimmed === '') {
            return $innerHtml;
        }

        $tokens = [];
        $work = $trimmed;

        // 1. Replace protected code/block placeholders \x00BLK_n\x00 -> [[Cn]]
        $codeIndex = 0;
        $work = preg_replace_callback('/\x00BLK_(\d+)\x00/', static function (array $m) use (&$tokens, &$codeIndex): string {
            $tag = '[[C'.$codeIndex.']]';
            $codeIndex++;
            $tokens[$tag] = $m[0];

            return $tag;
        }, $work) ?? $work;

        // Also tokenize any raw inline <code>...</code> or <pre>...</pre> (e.g. inside topic-navs if any)
        $work = preg_replace_callback('/<(?:pre|code)\b[^>]*>.*?<\/(?:pre|code)>/is', static function (array $m) use (&$tokens, &$codeIndex): string {
            $tag = '[[C'.$codeIndex.']]';
            $codeIndex++;
            $tokens[$tag] = $m[0];

            return $tag;
        }, $work) ?? $work;

        // 2. Replace <a ...>...</a> tags as [[Ai]]...[[/Ai]] preserving exact href/class attributes
        $linkStack = [];
        $linkIndex = 0;
        $work = preg_replace_callback('/<a\b[^>]*>|<\/a>/is', static function (array $m) use (&$tokens, &$linkStack, &$linkIndex): string {
            if (strtolower($m[0]) === '</a>') {
                $id = ! empty($linkStack) ? array_pop($linkStack) : 0;
                $endTag = '[[/A'.$id.']]';
                $tokens[$endTag] = '</a>';

                return $endTag;
            }
            $id = $linkIndex++;
            $linkStack[] = $id;
            $startTag = '[[A'.$id.']]';
            $tokens[$startTag] = $m[0];

            return $startTag;
        }, $work) ?? $work;

        // 3. Tokenize non-trivial <span> tags as [[Si]]...[[/Si]]
        $spanStack = [];
        $spanIndex = 0;
        $work = preg_replace_callback('/<span\b[^>]*>|<\/span>/is', static function (array $m) use (&$tokens, &$spanStack, &$spanIndex): string {
            if (strtolower($m[0]) === '</span>') {
                $id = ! empty($spanStack) ? array_pop($spanStack) : 0;
                $endTag = '[[/S'.$id.']]';
                $tokens[$endTag] = '</span>';

                return $endTag;
            }
            $id = $spanIndex++;
            $spanStack[] = $id;
            $startTag = '[[S'.$id.']]';
            $tokens[$startTag] = $m[0];

            return $startTag;
        }, $work) ?? $work;

        // Normalize whitespace, <br> variants, and typographic apostrophes
        $work = preg_replace('/<br\s*\/?>/i', '<br>', $work) ?? $work;
        $work = preg_replace('/\s+/u', ' ', $work) ?? $work;
        $work = trim($work, " \t\n\r\v");
        $workNorm = str_replace(['&#x27;', '&#39;', '&apos;', '&rsquo;', "\u{2019}"], "'", $work);
        $workNorm = str_replace(['&ldquo;', '&rdquo;', '&quot;', '&#34;', '&#x22;'], '"', $workNorm);

        // Preserve leading/trailing whitespace of original HTML node
        preg_match('/^(\s*)(.*?)(\s*)$/s', $innerHtml, $ws);
        $leadWs = $ws[1] ?? '';
        $trailWs = $ws[3] ?? '';

        if (isset($dict[$workNorm])) {
            $translated = self::restoreTokens($dict[$workNorm], $tokens);

            return $leadWs.$translated.$trailWs;
        }
        if (isset($dict[$work])) {
            $translated = self::restoreTokens($dict[$work], $tokens);

            return $leadWs.$translated.$trailWs;
        }

        // Dynamic fallback for "X Labs" / "X labs" / "View all X labs"
        if (preg_match('/^(\d+)\s+labs$/i', $workNorm, $lm)) {
            $suffix = $lm[0][strlen($lm[0]) - 4] === 'L' ? 'Lab' : 'lab';

            return $leadWs.$lm[1].' '.$suffix.$trailWs;
        }

        return $innerHtml;
    }

    private static function restoreTokens(string $translated, array $tokens): string
    {
        if (empty($tokens)) {
            return $translated;
        }

        return strtr($translated, $tokens);
    }

    private static function translatePageTitle(string $rawTitle, array $dict): string
    {
        $parts = explode(' | ', $rawTitle);
        $out = [];
        foreach ($parts as $i => $part) {
            $trimmed = trim($part);
            // Keep trailing brand name intact
            if ($i === count($parts) - 1 && $trimmed !== 'Web Security Academy') {
                $out[] = $trimmed;
                continue;
            }
            $norm = str_replace(['&#x27;', '&#39;', '&rsquo;'], "'", $trimmed);
            $out[] = $dict[$norm] ?? $dict[$trimmed] ?? $trimmed;
        }

        return implode(' | ', $out);
    }

    /**
     * @return array<string, string>
     */
    private static function loadNavDictionary(string $categoryId): array
    {
        $navs = self::loadFile('_navs.php');
        $overrides = $navs['_by_category'][$categoryId] ?? [];
        unset($navs['_by_category']);

        return array_merge($navs, is_array($overrides) ? $overrides : []);
    }

    /**
     * @return array<string, string>
     */
    private static function buildDictionaryForTopic(string $topic, string $viewName): array
    {
        $merged = array_merge(
            self::loadFile('_common.php'),
            self::loadFile('_titles.php'),
            self::loadNavDictionary(self::categoryForTopic($topic))
        );

        foreach (self::dictionaryFilesFor($topic, $viewName) as $file) {
            $merged = array_merge($merged, self::loadFile($file));
        }

        return $merged;
    }

    /**
     * @return array<int, string>
     */
    private static function dictionaryFilesFor(string $topic, string $viewName): array
    {
        if ($viewName === 'pages.web-security__all-materials' || $viewName === 'pages.web-security__all-materials__detailed') {
            return ['hubs.php'];
        }

        $files = match ($topic) {
            'sql-injection' => ['sql-injection.php'],
            'cross-site-scripting' => ['cross-site-scripting.php'],
            'csrf' => ['csrf.php'],
            'clickjacking' => ['clickjacking.php'],
            'dom-based' => ['dom-based.php'],
            'cors' => ['cors.php'],
            'xxe' => ['xxe.php'],
            'ssrf' => ['ssrf.php'],
            'request-smuggling' => ['request-smuggling.php'],
            'os-command-injection' => ['os-command-injection.php'],
            'server-side-template-injection' => ['server-side-template-injection.php'],
            'file-path-traversal' => ['path-traversal.php'],
            'access-control' => ['access-control.php'],
            'authentication' => ['authentication.php'],
            'websockets' => ['websockets.php'],
            'web-cache-poisoning' => ['web-cache-poisoning.php'],
            'deserialization' => ['deserialization.php'],
            'information-disclosure' => ['information-disclosure.php'],
            'logic-flaws' => ['business-logic.php'],
            'host-header' => ['host-header.php'],
            'oauth' => ['oauth.php'],
            'jwt' => ['jwt.php'],
            'file-upload' => ['file-upload.php'],
            'essential-skills' => ['essential-skills.php'],
            'prototype-pollution' => ['prototype-pollution.php'],
            'graphql' => ['graphql.php'],
            'race-conditions' => ['race-conditions.php'],
            'nosql-injection' => ['nosql-injection.php'],
            'api-testing' => ['api-testing.php'],
            'llm-attacks' => ['llm-attacks.php'],
            'web-cache-deception' => ['web-cache-deception.php'],
            'learning-paths' => ['learning-paths.php'],
            'certification' => ['certification.php'],
            default => ['hubs.php'],
        };

        // Some topic articles link to cheat sheets / companion topics
        if ($topic === 'dom-based') {
            $files[] = 'cross-site-scripting.php';
        }
        if ($topic === 'essential-skills') {
            $files[] = 'hubs.php';
        }

        return $files;
    }

    private static function topicForView(string $viewName): string
    {
        $slug = preg_replace('/^pages\./', '', $viewName) ?? $viewName;
        if (str_starts_with($slug, 'web-security__')) {
            $rest = substr($slug, strlen('web-security__'));
            $parts = explode('__', $rest);
            if ($parts[0] === 'learning-paths' && isset($parts[3]) && $parts[3] !== '') {
                return $parts[3];
            }

            return $parts[0] ?: 'hubs';
        }

        return 'hubs';
    }

    private static function categoryForTopic(string $topic): string
    {
        return match ($topic) {
            'csrf' => 'cross-site-request-forgery-csrf',
            'dom-based' => 'dom-based-vulnerabilities',
            'cors' => 'cross-origin-resource-sharing-cors',
            'xxe' => 'xml-external-entity-xxe-injection',
            'ssrf' => 'server-side-request-forgery-ssrf',
            'request-smuggling' => 'http-request-smuggling',
            'file-path-traversal' => 'path-traversal',
            'access-control' => 'access-control-vulnerabilities',
            'deserialization' => 'insecure-deserialization',
            'logic-flaws' => 'business-logic-vulnerabilities',
            'host-header' => 'http-host-header-attacks',
            'oauth' => 'oauth-authentication',
            'file-upload' => 'file-upload-vulnerabilities',
            'graphql' => 'graphql-api-vulnerabilities',
            'llm-attacks' => 'web-llm-attacks',
            default => $topic,
        };
    }

    /**
     * @return array<string, mixed>
     */
    private static function loadFile(string $relative): array
    {
        if (isset(self::$cache[$relative])) {
            return self::$cache[$relative];
        }

        $path = lang_path('id/pages/'.$relative);
        $data = file_exists($path) ? require $path : [];

        return self::$cache[$relative] = is_array($data) ? $data : [];
    }
}
