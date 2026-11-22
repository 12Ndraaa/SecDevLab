<?php

namespace App\Services;

use App\Models\Lab;

class LabArchetypeResolver
{
    public const ARCHETYPES = [
        'storefront' => [
            'id' => 'storefront',
            'label' => 'Storefront & Commerce',
            'short' => 'STOREFRONT',
            'tone' => 'orange',
            'prompt' => 'sql / cart / logic',
            'description' => 'Retail catalog, query filtering, cart checkout & race condition engine.',
        ],
        'diagnostic' => [
            'id' => 'diagnostic',
            'label' => 'Diagnostic & Asset Probe',
            'short' => 'DIAGNOSTIC',
            'tone' => 'cyan',
            'prompt' => 'stock / xml / ssrf / fs',
            'description' => 'Warehouse stock XML/SSRF/shell diagnostic and filesystem asset viewer.',
        ],
        'media-upload' => [
            'id' => 'media-upload',
            'label' => 'Media Upload Portal',
            'short' => 'MEDIA PORTAL',
            'tone' => 'emerald',
            'prompt' => 'multipart / sandbox-php',
            'description' => 'Authenticated avatar multipart uploader, virtual storage vault & sandbox evaluator.',
        ],
        'identity' => [
            'id' => 'identity',
            'label' => 'Identity & Access Control',
            'short' => 'IDENTITY & AUTH',
            'tone' => 'info',
            'prompt' => 'auth / jwt / oauth / rbac',
            'description' => 'Session authentication, JWT claims, OAuth 2.0 grants, CSRF & admin access boundaries.',
        ],
        'api-graphql' => [
            'id' => 'api-graphql',
            'label' => 'API & GraphQL Explorer',
            'short' => 'API / GRAPHQL',
            'tone' => 'purple',
            'prompt' => 'rest / graphql / schema',
            'description' => 'Interactive REST API endpoint explorer and GraphQL query/introspection workbench.',
        ],
        'editorial' => [
            'id' => 'editorial',
            'label' => 'Editorial & Client Sink',
            'short' => 'EDITORIAL / SINK',
            'tone' => 'orange',
            'prompt' => 'xss / dom / ssti / proto',
            'description' => 'Editorial blog renderer, DOM source-to-sink tracer, framing inspector, SSTI & prototype workbench.',
        ],
        'ai-websocket' => [
            'id' => 'ai-websocket',
            'label' => 'AI Agent & WebSocket Console',
            'short' => 'AI / WEBSOCKET',
            'tone' => 'cyan',
            'prompt' => 'llm-tools / wss-frames',
            'description' => 'Real-time TerminalUI conversational agent with tool calls and WebSocket frame relay.',
        ],
        'http-inspector' => [
            'id' => 'http-inspector',
            'label' => 'HTTP & Cache Inspector',
            'short' => 'HTTP INSPECTOR',
            'tone' => 'warning',
            'prompt' => 'headers / cache / cors / deser',
            'description' => 'Raw HTTP header, cache key, CORS reflection, request smuggling & serialization inspector.',
        ],
    ];

    public const CATEGORY_ARCHETYPE_MAP = [
        // 1. Storefront
        'sql-injection' => 'storefront',
        'nosql-injection' => 'storefront',
        'business-logic-vulnerabilities' => 'storefront',
        'race-conditions' => 'storefront',

        // 2. Diagnostic
        'os-command-injection' => 'diagnostic',
        'server-side-request-forgery-ssrf' => 'diagnostic',
        'xml-external-entity-xxe-injection' => 'diagnostic',
        'path-traversal' => 'diagnostic',

        // 3. Media Upload Portal
        'file-upload-vulnerabilities' => 'media-upload',

        // 4. Identity & Access Control
        'authentication' => 'identity',
        'access-control-vulnerabilities' => 'identity',
        'oauth-authentication' => 'identity',
        'jwt' => 'identity',
        'cross-site-request-forgery-csrf' => 'identity',

        // 5. API & GraphQL Explorer
        'api-testing' => 'api-graphql',
        'graphql-api-vulnerabilities' => 'api-graphql',

        // 6. Editorial / DOM / Clickjacking / SSTI / Prototype Pollution
        'cross-site-scripting' => 'editorial',
        'dom-based-vulnerabilities' => 'editorial',
        'clickjacking' => 'editorial',
        'server-side-template-injection' => 'editorial',
        'prototype-pollution' => 'editorial',

        // 7. AI Agent & WebSocket Console
        'web-llm-attacks' => 'ai-websocket',
        'websockets' => 'ai-websocket',

        // 8. HTTP Header / Cache / CORS / Smuggling / Deserialization / Info Disc / Essential Skills
        'http-host-header-attacks' => 'http-inspector',
        'web-cache-poisoning' => 'http-inspector',
        'web-cache-deception' => 'http-inspector',
        'cross-origin-resource-sharing-cors' => 'http-inspector',
        'http-request-smuggling' => 'http-inspector',
        'insecure-deserialization' => 'http-inspector',
        'information-disclosure' => 'http-inspector',
        'essential-skills' => 'http-inspector',
    ];

    public function resolve(Lab $lab): string
    {
        $cid = strtolower((string) $lab->category_id);
        if (isset(self::CATEGORY_ARCHETYPE_MAP[$cid])) {
            return self::CATEGORY_ARCHETYPE_MAP[$cid];
        }

        // Dynamic fallback for owner-created custom categories
        $profile = is_array($lab->profile) ? $lab->profile : [];
        if (! empty($profile['hasLiveChat'])) {
            return 'ai-websocket';
        }
        if (! empty($profile['hasAvatarUpload'])) {
            return 'media-upload';
        }
        if (! empty($profile['hasStockCheck']) || ! empty($profile['usesImageFilenameEndpoint'])) {
            return 'diagnostic';
        }
        if (! empty($profile['hasCart'])) {
            return 'storefront';
        }
        if (! empty($profile['hasAdminPanel']) && empty($profile['hasCategoryFilter'])) {
            return 'identity';
        }
        if (($profile['theme'] ?? '') === 'blog') {
            return 'editorial';
        }

        return 'storefront';
    }

    /**
     * @return array<string, string>
     */
    public function meta(Lab $lab): array
    {
        $archetype = $this->resolve($lab);

        return self::ARCHETYPES[$archetype] ?? self::ARCHETYPES['storefront'];
    }

    /**
     * Direct topic-feature landing view when visiting /lab/{token} with no explicit sub-route.
     */
    public function defaultLandingView(Lab $lab): string
    {
        $cid = strtolower((string) $lab->category_id);
        $profile = is_array($lab->profile) ? $lab->profile : [];
        $requiredTarget = (string) ($profile['requiredTarget'] ?? '');
        $archetype = $this->resolve($lab);

        return match ($archetype) {
            'storefront' => match (true) {
                in_array($cid, ['business-logic-vulnerabilities', 'race-conditions'], true) || $requiredTarget === 'cart' => 'cart',
                $requiredTarget === 'login' => 'my-account',
                default => 'shop',
            },
            'diagnostic' => $cid === 'path-traversal' ? 'file-viewer' : 'product',
            'media-upload' => 'media-portal',
            'identity' => match ($cid) {
                'jwt' => 'jwt-workbench',
                'oauth-authentication' => 'oauth-workbench',
                default => 'my-account',
            },
            'api-graphql' => $cid === 'graphql-api-vulnerabilities' ? 'graphql' : 'api-explorer',
            'editorial' => match ($cid) {
                'dom-based-vulnerabilities' => 'dom-workbench',
                'clickjacking' => 'clickjacking-workbench',
                'server-side-template-injection' => 'ssti-workbench',
                'prototype-pollution' => 'prototype-workbench',
                default => 'blog',
            },
            'ai-websocket' => 'chat',
            'http-inspector' => 'http-inspector',
            default => ($profile['theme'] ?? 'ecommerce') === 'blog' ? 'blog' : 'shop',
        };
    }
}
