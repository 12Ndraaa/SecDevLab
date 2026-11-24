<?php

namespace App\Services;

class CatalogLocalization
{
    /** @var array<string, string>|null */
    private static ?array $idCategories = null;

    /** @var array<string, array<string, array<string, mixed>>> */
    private static array $idLabsByCategory = [];

    private const SECTION_TITLES_ID = [
        'Hint' => 'Petunjuk',
        'Tip' => 'Tips',
        'Passwords' => 'Daftar Kata Sandi',
        'Solution' => 'Solusi',
        'Manual solution' => 'Solusi manual',
        'DOM Invader solution' => 'Solusi DOM Invader',
        'Solution - Burp Suite Professional' => 'Solusi Burp Suite Professional',
        'Solution - Burp Suite Community Edition' => 'Solusi Burp Suite Community Edition',
        'Community solutions' => 'Solusi komunitas',
    ];

    public static function shouldUseIndonesian(?string $locale = null): bool
    {
        return ($locale ?? app()->getLocale()) === 'id';
    }

    /**
     * @return array<string, string>
     */
    public static function idCategories(): array
    {
        if (self::$idCategories === null) {
            $path = lang_path('id/catalog_categories.php');
            self::$idCategories = is_file($path) ? (array) require $path : [];
        }

        return self::$idCategories;
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public static function idLabsForCategory(string $categoryId): array
    {
        $safe = preg_replace('/[^a-z0-9\-_]/i', '', $categoryId) ?: '';
        if ($safe === '') {
            return [];
        }

        if (! isset(self::$idLabsByCategory[$safe])) {
            $path = lang_path("id/catalog_labs/{$safe}.php");
            self::$idLabsByCategory[$safe] = is_file($path) ? (array) require $path : [];
        }

        return self::$idLabsByCategory[$safe];
    }

    public static function categoryTitle(string $id, string $fallback, ?string $locale = null): string
    {
        if (! self::shouldUseIndonesian($locale)) {
            return $fallback;
        }

        $map = self::idCategories();

        return $map[$id] ?? $fallback;
    }

    public static function labTitle(string $id, string $categoryId, string $fallback, ?string $locale = null): string
    {
        if (! self::shouldUseIndonesian($locale)) {
            return $fallback;
        }

        $entry = self::idLabsForCategory($categoryId)[$id] ?? null;

        return is_array($entry) && ! empty($entry['title'])
            ? (string) $entry['title']
            : $fallback;
    }

    public static function labDescriptionHtml(string $id, string $categoryId, string $fallback, ?string $locale = null): string
    {
        if (! self::shouldUseIndonesian($locale)) {
            return $fallback;
        }

        $entry = self::idLabsForCategory($categoryId)[$id] ?? null;
        $desc = is_array($entry) ? ($entry['descriptionHtml'] ?? $entry['description_html'] ?? null) : null;
        if (! is_string($desc) || $desc === '') {
            return $fallback;
        }

        return self::restoreCodePlaceholders($desc, $fallback);
    }

    /**
     * @param  array<int, array<string, mixed>>  $fallbackSections
     * @return array<int, array<string, mixed>>
     */
    public static function labSections(string $id, string $categoryId, array $fallbackSections, ?string $locale = null): array
    {
        if (! self::shouldUseIndonesian($locale)) {
            return $fallbackSections;
        }

        $entry = self::idLabsForCategory($categoryId)[$id] ?? null;
        $translatedBodies = is_array($entry) && isset($entry['sections']) && is_array($entry['sections'])
            ? $entry['sections']
            : [];

        $out = [];
        foreach ($fallbackSections as $idx => $sec) {
            if (! is_array($sec)) {
                $out[] = $sec;

                continue;
            }

            $origTitle = (string) ($sec['title'] ?? '');
            $origBody = (string) ($sec['bodyHtml'] ?? '');

            $newTitle = self::SECTION_TITLES_ID[$origTitle] ?? $origTitle;
            $newBody = $translatedBodies[$idx] ?? ($translatedBodies[$origTitle] ?? null);

            if ($newBody === null) {
                $newBody = $origTitle === 'Community solutions'
                    ? str_replace('(no audio)', '(tanpa audio)', $origBody)
                    : $origBody;
            } else {
                $newBody = self::restoreCodePlaceholders((string) $newBody, $origBody);
            }

            $sec['title'] = $newTitle;
            $sec['bodyHtml'] = $newBody;
            $out[] = $sec;
        }

        return $out;
    }

    public static function restoreCodePlaceholders(string $template, string $sourceHtml): string
    {
        if (! str_contains($template, '[[C')) {
            return $template;
        }

        if (! preg_match_all('/<pre\b[^>]*>.*?<\/pre>|<code\b[^>]*>.*?<\/code>/is', $sourceHtml, $matches)) {
            return $template;
        }

        $replacements = [];
        foreach ($matches[0] as $i => $block) {
            $replacements['[[C'.$i.']]'] = $block;
        }

        return strtr($template, $replacements);
    }
}
