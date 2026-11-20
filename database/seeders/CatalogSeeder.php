<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Lab;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    public const CATEGORY_TOPIC_ROUTE = [
        'sql-injection' => '/web-security/sql-injection',
        'cross-site-scripting' => '/web-security/cross-site-scripting',
        'cross-site-request-forgery-csrf' => '/web-security/csrf',
        'clickjacking' => '/web-security/clickjacking',
        'dom-based-vulnerabilities' => '/web-security/dom-based',
        'cross-origin-resource-sharing-cors' => '/web-security/cors',
        'xml-external-entity-xxe-injection' => '/web-security/xxe',
        'server-side-request-forgery-ssrf' => '/web-security/ssrf',
        'http-request-smuggling' => '/web-security/request-smuggling',
        'os-command-injection' => '/web-security/os-command-injection',
        'server-side-template-injection' => '/web-security/server-side-template-injection',
        'path-traversal' => '/web-security/file-path-traversal',
        'access-control-vulnerabilities' => '/web-security/access-control',
        'authentication' => '/web-security/authentication',
        'websockets' => '/web-security/websockets',
        'web-cache-poisoning' => '/web-security/web-cache-poisoning',
        'insecure-deserialization' => '/web-security/deserialization',
        'information-disclosure' => '/web-security/information-disclosure',
        'business-logic-vulnerabilities' => '/web-security/logic-flaws',
        'http-host-header-attacks' => '/web-security/host-header',
        'oauth-authentication' => '/web-security/oauth',
        'file-upload-vulnerabilities' => '/web-security/file-upload',
        'jwt' => '/web-security/jwt',
        'essential-skills' => '/web-security/essential-skills',
        'prototype-pollution' => '/web-security/prototype-pollution',
        'graphql-api-vulnerabilities' => '/web-security/graphql',
        'race-conditions' => '/web-security/race-conditions',
        'nosql-injection' => '/web-security/nosql-injection',
        'api-testing' => '/web-security/api-testing',
        'web-llm-attacks' => '/web-security/llm-attacks',
        'web-cache-deception' => '/web-security/web-cache-deception',
    ];

    public function run(): void
    {
        $catalog = json_decode(
            file_get_contents(database_path('seeders/data/catalog.json')),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        $profilesRaw = json_decode(
            file_get_contents(database_path('seeders/data/lab_profiles.json')),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
        $profilesMap = $profilesRaw['profiles'] ?? [];

        $now = now();
        $categoryRows = [];
        $labRows = [];
        $catOrder = 0;

        foreach ($catalog['categories'] as $cat) {
            $catOrder++;
            $catId = $cat['id'];
            $categoryRows[] = [
                'id' => $catId,
                'title' => $cat['title'],
                'topic_route' => self::CATEGORY_TOPIC_ROUTE[$catId] ?? "/web-security/{$catId}",
                'lab_count' => (int) ($cat['count'] ?? count($cat['labs'] ?? [])),
                'sort_order' => $catOrder,
                'created_at' => $now,
                'updated_at' => $now,
            ];

            $labOrder = 0;
            foreach ($cat['labs'] ?? [] as $lab) {
                $labOrder++;
                $labId = strtolower($lab['id']);
                $href = rtrim((string) ($lab['href'] ?? ''), '/');
                $profile = $profilesMap[$labId] ?? null;

                $labRows[] = [
                    'id' => $labId,
                    'category_id' => $catId,
                    'title' => $lab['title'],
                    'href' => $href,
                    'difficulty' => $lab['difficulty'] ?? 'APPRENTICE',
                    'difficulty_class' => $lab['difficultyClass'] ?? 'label-light-green-small',
                    'description_html' => $lab['descriptionHtml'] ?? '',
                    'sections' => json_encode($lab['sections'] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
                    'profile' => $profile ? json_encode($profile, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : null,
                    'sort_order' => $labOrder,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        Category::upsert($categoryRows, ['id'], ['title', 'topic_route', 'lab_count', 'sort_order', 'updated_at']);

        foreach (array_chunk($labRows, 50) as $chunk) {
            Lab::upsert(
                $chunk,
                ['id'],
                ['category_id', 'title', 'href', 'difficulty', 'difficulty_class', 'description_html', 'sections', 'profile', 'sort_order', 'updated_at']
            );
        }

        $products = [
            ['id' => 7, 'img' => '/image/productcatalog/products/30.jpg', 'filename' => '30.jpg', 'name' => 'Giant Pillow Thing', 'cat' => 'Lifestyle', 'price' => '$95.14', 'stars' => 5, 'released' => true, 'desc' => 'Ultra-plush oversized body pillow engineered for maximum comfort during marathon security research sessions.'],
            ['id' => 12, 'img' => '/image/productcatalog/products/5.jpg', 'filename' => '5.jpg', 'name' => 'Cheshire Cat Grin', 'cat' => 'Gifts', 'price' => '$27.62', 'stars' => 4, 'released' => true, 'desc' => 'Glow-in-the-dark novelty grin mask that stays visible even when the lights go out.'],
            ['id' => 17, 'img' => '/image/productcatalog/products/38.jpg', 'filename' => '38.jpg', 'name' => 'Six Pack Beer Belt', 'cat' => 'Accessories', 'price' => '$29.69', 'stars' => 2, 'released' => true, 'desc' => 'Hands-free utility belt with six insulated beverage holsters for field operations.'],
            ['id' => 9, 'img' => '/image/productcatalog/products/24.jpg', 'filename' => '24.jpg', 'name' => 'The Alternative Christmas Tree', 'cat' => 'Gifts', 'price' => '$64.89', 'stars' => 2, 'released' => true, 'desc' => 'Minimalist suspended holiday tree designed for compact apartments and hacker labs.'],
            ['id' => 14, 'img' => '/image/productcatalog/products/12.jpg', 'filename' => '12.jpg', 'name' => 'Hologram Stand In', 'cat' => 'Lifestyle', 'price' => '$19.48', 'stars' => 5, 'released' => true, 'desc' => 'Life-size webcam stand-in projection for early-morning video calls.'],
            ['id' => 19, 'img' => '/image/productcatalog/products/60.jpg', 'filename' => '60.jpg', 'name' => 'Dancing In The Dark', 'cat' => 'Clothing, shoes and accessories', 'price' => '$61.21', 'stars' => 3, 'released' => true, 'desc' => 'Electroluminescent wire glasses and neon glow suit.'],
            ['id' => 8, 'img' => '/image/productcatalog/products/7.jpg', 'filename' => '7.jpg', 'name' => 'Conversation Controlling Lemon', 'cat' => 'Gifts', 'price' => '$79.49', 'stars' => 1, 'released' => true, 'desc' => 'Acoustic tabletop timer that politely interrupts overly long meetings.'],
            ['id' => 13, 'img' => '/image/productcatalog/products/21.jpg', 'filename' => '21.jpg', 'name' => 'Snow Delivered To Your Door', 'cat' => 'Gifts', 'price' => '$33.83', 'stars' => 3, 'released' => true, 'desc' => 'Instant polymer snow pack shipped chilled in an insulated crate.'],
            ['id' => 18, 'img' => '/image/productcatalog/products/53.jpg', 'filename' => '53.jpg', 'name' => 'High-End Gift Wrapping', 'cat' => 'Accessories', 'price' => '$32.59', 'stars' => 5, 'released' => true, 'desc' => 'Bespoke metallic foil gift wrapping with embossed wax seal.'],
            ['id' => 10, 'img' => '/image/productcatalog/products/4.jpg', 'filename' => '4.jpg', 'name' => 'BURP Protection', 'cat' => 'Clothing, shoes and accessories', 'price' => '$72.42', 'stars' => 3, 'released' => true, 'desc' => 'Heavy-duty splash-resistant shoulder protection pad and lab apron.'],
            ['id' => 15, 'img' => '/image/productcatalog/products/41.jpg', 'filename' => '41.jpg', 'name' => 'The Trapster', 'cat' => 'Accessories', 'price' => '$47.67', 'stars' => 4, 'released' => true, 'desc' => 'Novelty beverage trap and desktop physical security alarm.'],
            ['id' => 20, 'img' => '/image/productcatalog/products/14.jpg', 'filename' => '14.jpg', 'name' => 'Mood Enhancer', 'cat' => 'Lifestyle', 'price' => '$81.50', 'stars' => 4, 'released' => true, 'desc' => 'Full-spectrum daylight mood enhancer kit for late-night bug hunting.'],
            ['id' => 3, 'img' => '/image/productcatalog/products/4.jpg', 'filename' => '4.jpg', 'name' => 'Lightweight "l33t" Leather Jacket', 'cat' => 'Lifestyle', 'price' => '$1337.00', 'stars' => 5, 'released' => true, 'desc' => 'Our flagship item in the store. Engineered for high-stakes security researchers.'],
            ['id' => 1, 'img' => '/image/productcatalog/products/30.jpg', 'filename' => '30.jpg', 'name' => 'Zero-Day Unreleased Prototype [HIDDEN]', 'cat' => 'Unreleased', 'price' => '$999.00', 'stars' => 5, 'released' => false, 'desc' => 'Confidential pre-release hardware token (released = 0 in database).'],
            ['id' => 2, 'img' => '/image/productcatalog/products/12.jpg', 'filename' => '12.jpg', 'name' => 'Lightweight "l33t" Leather Jacket [HIDDEN]', 'cat' => 'Unreleased', 'price' => '$1337.00', 'stars' => 5, 'released' => false, 'desc' => 'Flagship unreleased leather jacket (released = 0 in database).'],
        ];

        $productRows = array_map(fn ($p) => [...$p, 'created_at' => $now, 'updated_at' => $now], $products);
        Product::upsert($productRows, ['id'], ['img', 'filename', 'name', 'cat', 'price', 'stars', 'released', 'desc', 'updated_at']);

        $blogPosts = [
            ['id' => 1, 'img' => '/image/productcatalog/products/30.jpg', 'title' => 'When Coffee Is Not Enough: Inside the Repeater Workflow', 'author' => 'Carlos Montoya', 'published_label' => '10 Nov 2026', 'excerpt' => 'How methodical request modification uncovers subtle server-side logic flaws before automated scanners.', 'body' => 'Every request tells a story. By isolating parameters one at a time and observing response diffs, you can map hidden query states and authentication boundaries.'],
            ['id' => 2, 'img' => '/image/productcatalog/products/5.jpg', 'title' => 'The Art of Context-Aware DOM Analysis', 'author' => 'Peter Wiener', 'published_label' => '08 Nov 2026', 'excerpt' => 'Tracing sources and sinks across modern single-page applications without losing sight of browser quirks.', 'body' => 'DOM-based vulnerabilities arise when client-side scripts pass attacker-controllable data from a source like location.search into a dangerous sink such as innerHTML or eval().'],
            ['id' => 3, 'img' => '/image/productcatalog/products/24.jpg', 'title' => 'Why Desynchronized Caches Love Ambiguous Paths', 'author' => 'Admin Editorial', 'published_label' => '04 Nov 2026', 'excerpt' => 'Discrepancies between front-end caching rules and origin path normalization create rich attack surface.', 'body' => 'When a CDN treats a URL as a static resource while the origin framework interprets it as a dynamic route, sensitive authenticated responses can be cached publicly.'],
            ['id' => 4, 'img' => '/image/productcatalog/products/14.jpg', 'title' => 'Securing Large Language Models Against Indirect Prompt Injection', 'author' => 'Arti Ficial', 'published_label' => '01 Nov 2026', 'excerpt' => 'When an AI assistant reads untrusted product reviews or web pages, every comment becomes an instruction vector.', 'body' => 'Always treat LLM tool invocations with the same privilege boundaries as untrusted user input. Never expose destructive internal APIs without explicit user confirmation.'],
            ['id' => 5, 'img' => '/image/productcatalog/products/38.jpg', 'title' => 'Anatomy of a Second-Order SQL Injection', 'author' => 'Peter Wiener', 'published_label' => '28 Oct 2026', 'excerpt' => 'Why parameterized storage is meaningless if downstream reporting queries concatenate trusted columns.', 'body' => 'Stored payloads wait quietly until an administrative batch job or profile view interpolates the value into a dynamic query.'],
            ['id' => 6, 'img' => '/image/productcatalog/products/41.jpg', 'title' => 'Taming Cross-Origin Resource Sharing in Complex SPAs', 'author' => 'Carlos Montoya', 'published_label' => '22 Oct 2026', 'excerpt' => 'Reflecting arbitrary Origin headers with Access-Control-Allow-Credentials turns browsers into proxies.', 'body' => 'Never dynamically reflect the Origin header without strict allowlist validation, and never trust the null origin on authenticated endpoints.'],
        ];

        $blogRows = array_map(fn ($b) => [...$b, 'created_at' => $now, 'updated_at' => $now], $blogPosts);
        BlogPost::upsert($blogRows, ['id'], ['img', 'title', 'author', 'published_label', 'excerpt', 'body', 'updated_at']);
    }
}
