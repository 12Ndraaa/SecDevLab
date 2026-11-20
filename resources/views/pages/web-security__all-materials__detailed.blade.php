@extends('layouts.academy')

@section('title', 'All learning materials - detailed | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="-1">
            <nav class="nav-lhs-scrollable">
                <label class="nav-lhs-toggle-label" for="nav-lhs-toggle"></label>
                
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/all-materials"><span itemprop="name">All materials</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/all-materials/detailed"><span itemprop="name">Detailed</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">All learning materials - detailed</h1><table class="is-nonresponsive-table">
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/learning-paths">Web Security Academy Learning Paths</a></strong>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/race-conditions">Race conditions</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/race-conditions#limit-overrun-race-conditions">Limit overrun race conditions</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions#detecting-and-exploiting-limit-overrun-race-conditions-with-burp-repeater">Detecting and exploiting limit overrun race conditions with Burp Repeater</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions#detecting-and-exploiting-limit-overrun-race-conditions-with-turbo-intruder">Detecting and exploiting limit overrun race conditions with Turbo Intruder</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/race-conditions#hidden-multi-step-sequences">Hidden multi-step sequences</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/race-conditions#methodology">Methodology</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions#1-predict-potential-collisions">1 - Predict potential collisions</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions#2-probe-for-clues">2 - Probe for clues</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions#3-prove-the-concept">3 - Prove the concept</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/race-conditions#multi-endpoint-race-conditions">Multi-endpoint race conditions</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions#aligning-multi-endpoint-race-windows">Aligning multi-endpoint race windows</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/race-conditions#connection-warming">Connection warming</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/race-conditions#abusing-rate-or-resource-limits">Abusing rate or resource limits</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/race-conditions#single-endpoint-race-conditions">Single-endpoint race conditions</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/race-conditions#session-based-locking-mechanisms">Session-based locking mechanisms</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/race-conditions#partial-construction-race-conditions">Partial construction race conditions</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/race-conditions#time-sensitive-attacks">Time-sensitive attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/race-conditions#how-to-prevent-race-condition-vulnerabilities">How to prevent race condition vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-limit-overrun#predict-a-potential-collision">Predict a potential collision</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-limit-overrun#benchmark-the-behavior">Benchmark the behavior</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-limit-overrun#probe-for-clues">Probe for clues</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-limit-overrun#prove-the-concept">Prove the concept</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-bypassing-rate-limits#predict-a-potential-collision">Predict a potential collision</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-bypassing-rate-limits#benchmark-the-behavior">Benchmark the behavior</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-bypassing-rate-limits#probe-for-clues">Probe for clues</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-bypassing-rate-limits#prove-the-concept">Prove the concept</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-multi-endpoint#predict-a-potential-collision">Predict a potential collision</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-multi-endpoint#benchmark-the-behavior">Benchmark the behavior</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-multi-endpoint#prove-the-concept">Prove the concept</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-single-endpoint#predict-a-potential-collision">Predict a potential collision</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-single-endpoint#benchmark-the-behavior">Benchmark the behavior</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-single-endpoint#probe-for-clues">Probe for clues</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-single-endpoint#prove-the-concept">Prove the concept</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-partial-construction#predict-a-potential-collision">Predict a potential collision</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-partial-construction#benchmark-the-behavior">Benchmark the behavior</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-partial-construction#prove-the-concept">Prove the concept</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-exploiting-time-sensitive-vulnerabilities#study-the-behavior">Study the behavior</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-exploiting-time-sensitive-vulnerabilities#bypass-the-per-session-locking-restriction">Bypass the per-session locking restriction</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/race-conditions/lab-race-conditions-exploiting-time-sensitive-vulnerabilities#confirm-the-vulnerability">Confirm the vulnerability</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/graphql">GraphQL API vulnerabilities</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/graphql#finding-graphql-endpoints">Finding GraphQL endpoints</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql#universal-queries">Universal queries</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql#common-endpoint-names">Common endpoint names</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql#request-methods">Request methods</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql#initial-testing">Initial testing</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/graphql#exploiting-unsanitized-arguments">Exploiting unsanitized arguments</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/graphql#discovering-schema-information">Discovering schema information</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql#using-introspection">Using introspection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql#probing-for-introspection">Probing for introspection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql#running-a-full-introspection-query">Running a full introspection query</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql#visualizing-introspection-results">Visualizing introspection results</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql#suggestions">Suggestions</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/graphql#bypassing-graphql-introspection-defenses">Bypassing GraphQL introspection defenses</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/graphql#bypassing-rate-limiting-using-aliases">Bypassing rate limiting using aliases</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/graphql#graphql-csrf">GraphQL CSRF</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql#how-do-csrf-over-graphql-vulnerabilities-arise">How do CSRF over GraphQL vulnerabilities arise?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/graphql#preventing-graphql-attacks">Preventing GraphQL attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql#preventing-graphql-brute-force-attacks">Preventing GraphQL brute force attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql#preventing-csrf-over-graphql">Preventing CSRF over GraphQL</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/graphql/what-is-graphql">What is GraphQL?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql/what-is-graphql#how-graphql-works">How GraphQL works</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql/what-is-graphql#what-is-a-graphql-schema">What is a GraphQL schema?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql/what-is-graphql#what-are-graphql-queries">What are GraphQL queries?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql/what-is-graphql#what-are-graphql-mutations">What are GraphQL mutations?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql/what-is-graphql#components-of-queries-and-mutations">Components of queries and mutations</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/graphql/what-is-graphql#fields">Fields</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/graphql/what-is-graphql#arguments">Arguments</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/graphql/what-is-graphql#variables">Variables</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/graphql/what-is-graphql#aliases">Aliases</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/graphql/what-is-graphql#fragments">Fragments</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql/what-is-graphql#subscriptions">Subscriptions</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/graphql/what-is-graphql#introspection">Introspection</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/all-topics">All topics</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/all-topics#server-side-topics">Server-side topics</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/all-topics#client-side-topics">Client-side topics</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/all-topics#advanced-topics">Advanced topics</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/all-topics#want-the-latest-from-the-web-security-academy">Want the latest from the Web Security Academy?</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/mystery-lab-challenge">Put your recon skills to the test</a></strong>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/getting-started">Getting started with the Web Security Academy</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/getting-started#how-the-web-security-academy-works">How the Web Security Academy works</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/getting-started#get-started-with-your-first-topic">Get started with your first topic</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/getting-started#find-your-way-around-burp-suite-with-our-video-tutorials">Find your way around Burp Suite with our video tutorials</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/getting-started#keep-up-with-the-latest-from-the-web-security-academy">Keep up with the latest from the Web Security Academy</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/prototype-pollution">What is prototype pollution?</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/prototype-pollution#how-do-prototype-pollution-vulnerabilities-arise">How do prototype pollution vulnerabilities arise?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/prototype-pollution#prototype-pollution-sources">Prototype pollution sources</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution#prototype-pollution-via-the-url">Prototype pollution via the URL</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution#prototype-pollution-via-json-input">Prototype pollution via JSON input</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/prototype-pollution#prototype-pollution-sinks">Prototype pollution sinks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/prototype-pollution#prototype-pollution-gadgets">Prototype pollution gadgets</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution#example-of-a-prototype-pollution-gadget">Example of a prototype pollution gadget</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance">JavaScript prototypes and inheritance</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance#what-is-an-object-in-javascript">What is an object in JavaScript?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance#what-is-a-prototype-in-javascript">What is a prototype in JavaScript?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance#how-does-object-inheritance-work-in-javascript">How does object inheritance work in JavaScript?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance#the-prototype-chain">The prototype chain</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance#accessing-an-object-s-prototype-using-proto">Accessing an object's prototype using __proto__</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance#modifying-prototypes">Modifying prototypes</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/prototype-pollution/client-side">Client-side prototype pollution vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/client-side#finding-client-side-prototype-pollution-sources-manually">Finding client-side prototype pollution sources manually</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/client-side#finding-client-side-prototype-pollution-sources-using-dom-invader">Finding client-side prototype pollution sources using DOM Invader</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/client-side#finding-client-side-prototype-pollution-gadgets-manually">Finding client-side prototype pollution gadgets manually</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/client-side#finding-client-side-prototype-pollution-gadgets-using-dom-invader">Finding client-side prototype pollution gadgets using DOM Invader</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/client-side#prototype-pollution-via-the-constructor">Prototype pollution via the constructor</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/client-side#bypassing-flawed-key-sanitization">Bypassing flawed key sanitization</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/client-side#prototype-pollution-in-external-libraries">Prototype pollution in external libraries</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/client-side/browser-apis">Prototype pollution via browser APIs</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/prototype-pollution/client-side/browser-apis#prototype-pollution-via-fetch">Prototype pollution via fetch()</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/prototype-pollution/client-side/browser-apis#prototype-pollution-via-object-defineproperty">Prototype pollution via Object.defineProperty()</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/prototype-pollution/server-side">Server-side prototype pollution</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/server-side#why-is-server-side-prototype-pollution-more-difficult-to-detect">Why is server-side prototype pollution more difficult to detect?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/server-side#detecting-server-side-prototype-pollution-via-polluted-property-reflection">Detecting server-side prototype pollution via polluted property reflection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/server-side#detecting-server-side-prototype-pollution-without-polluted-property-reflection">Detecting server-side prototype pollution without polluted property reflection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/prototype-pollution/server-side#status-code-override">Status code override</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/prototype-pollution/server-side#json-spaces-override">JSON spaces override</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/prototype-pollution/server-side#charset-override">Charset override</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/server-side#scanning-for-server-side-prototype-pollution-sources">Scanning for server-side prototype pollution sources</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/server-side#bypassing-input-filters-for-server-side-prototype-pollution">Bypassing input filters for server-side prototype pollution</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/server-side#remote-code-execution-via-server-side-prototype-pollution">Remote code execution via server-side prototype pollution</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/prototype-pollution/server-side#identifying-a-vulnerable-request">Identifying a vulnerable request</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/prototype-pollution/server-side#remote-code-execution-via-child-process-fork">Remote code execution via child_process.fork()</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/prototype-pollution/server-side#remote-code-execution-via-child-process-execsync">Remote code execution via child_process.execSync()</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/prototype-pollution/preventing">Preventing prototype pollution vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/preventing#sanitizing-property-keys">Sanitizing property keys</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/preventing#preventing-changes-to-prototype-objects">Preventing changes to prototype objects</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/preventing#preventing-an-object-from-inheriting-properties">Preventing an object from inheriting properties</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/preventing#using-safer-alternatives-where-possible">Using safer alternatives where possible</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/essential-skills">Essential skills</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/essential-skills#obfuscating-attacks-using-encodings">Obfuscating attacks using encodings</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/essential-skills#using-burp-scanner-during-manual-testing">Using Burp Scanner during manual testing</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/essential-skills#identifying-unknown-vulnerabilities">Identifying unknown vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings">Obfuscating attacks using encodings</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#context-specific-decoding">Context-specific decoding</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#decoding-discrepancies">Decoding discrepancies</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-url-encoding">Obfuscation via URL encoding</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-double-url-encoding">Obfuscation via double URL encoding</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-html-encoding">Obfuscation via HTML encoding</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#leading-zeros">Leading zeros</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-xml-encoding">Obfuscation via XML encoding</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-unicode-escaping">Obfuscation via unicode escaping</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-hex-escaping">Obfuscation via hex escaping</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-octal-escaping">Obfuscation via octal escaping</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-multiple-encodings">Obfuscation via multiple encodings</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-the-sql-char-function">Obfuscation via the SQL CHAR() function</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/essential-skills/using-burp-scanner-during-manual-testing">Using Burp Scanner during manual testing</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/essential-skills/using-burp-scanner-during-manual-testing#scanning-a-specific-request">Scanning a specific request</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/essential-skills/using-burp-scanner-during-manual-testing#scanning-custom-insertion-points">Scanning custom insertion points</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/essential-skills/using-burp-scanner-during-manual-testing#scanning-non-standard-data-structures">Scanning non-standard data structures</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/sql-injection">SQL injection</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection#what-is-sql-injection-sqli">What is SQL injection (SQLi)?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection#what-is-the-impact-of-a-successful-sql-injection-attack">What is the impact of a successful SQL injection attack?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection#how-to-detect-sql-injection-vulnerabilities">How to detect SQL injection vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection#sql-injection-in-different-parts-of-the-query">SQL injection in different parts of the query</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection#sql-injection-examples">SQL injection examples</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection#retrieving-hidden-data">Retrieving hidden data</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection#subverting-application-logic">Subverting application logic</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection#retrieving-data-from-other-database-tables">Retrieving data from other database tables</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection#blind-sql-injection-vulnerabilities">Blind SQL injection vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection#second-order-sql-injection">Second-order SQL injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection#examining-the-database">Examining the database</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection#sql-injection-in-different-contexts">SQL injection in different contexts</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection#how-to-prevent-sql-injection">How to prevent SQL injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection/examining-the-database">Examining the database in SQL injection attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/examining-the-database#querying-the-database-type-and-version">Querying the database type and version</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/examining-the-database#listing-the-contents-of-the-database">Listing the contents of the database</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/sql-injection/examining-the-database#listing-the-contents-of-an-oracle-database">Listing the contents of an Oracle database</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection/union-attacks">SQL injection UNION attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/union-attacks#determining-the-number-of-columns-required">Determining the number of columns required</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/union-attacks#database-specific-syntax">Database-specific syntax</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/union-attacks#finding-columns-with-a-useful-data-type">Finding columns with a useful data type</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/union-attacks#using-a-sql-injection-union-attack-to-retrieve-interesting-data">Using a SQL injection UNION attack to retrieve interesting data</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/union-attacks#retrieving-multiple-values-within-a-single-column">Retrieving multiple values within a single column</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection/blind">Blind SQL injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/blind#what-is-blind-sql-injection">What is blind SQL injection?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/blind#exploiting-blind-sql-injection-by-triggering-conditional-responses">Exploiting blind SQL injection by triggering conditional responses</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/blind#error-based-sql-injection">Error-based SQL injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/sql-injection/blind#exploiting-blind-sql-injection-by-triggering-conditional-errors">Exploiting blind SQL injection by triggering conditional errors</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/sql-injection/blind#extracting-sensitive-data-via-verbose-sql-error-messages">Extracting sensitive data via verbose SQL error messages</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/blind#exploiting-blind-sql-injection-by-triggering-time-delays">Exploiting blind SQL injection by triggering time delays</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/blind#exploiting-blind-sql-injection-using-out-of-band-oast-techniques">Exploiting blind SQL injection using out-of-band (OAST) techniques</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/blind#how-to-prevent-blind-sql-injection-attacks">How to prevent blind SQL injection attacks?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/cheat-sheet#string-concatenation">String concatenation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/cheat-sheet#substring">Substring</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/cheat-sheet#comments">Comments</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/cheat-sheet#database-version">Database version</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/cheat-sheet#database-contents">Database contents</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/cheat-sheet#conditional-errors">Conditional errors</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/cheat-sheet#extracting-data-via-visible-error-messages">Extracting data via visible error messages</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/cheat-sheet#batched-or-stacked-queries">Batched (or stacked) queries</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/cheat-sheet#time-delays">Time delays</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/cheat-sheet#conditional-time-delays">Conditional time delays</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/cheat-sheet#dns-lookup">DNS lookup</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/sql-injection/cheat-sheet#dns-lookup-with-data-exfiltration">DNS lookup with data exfiltration</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/cross-site-scripting">Cross-site scripting</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting#what-is-cross-site-scripting-xss">What is cross-site scripting (XSS)?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting#how-does-xss-work">How does XSS work?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting#xss-proof-of-concept">XSS proof of concept</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting#what-are-the-types-of-xss-attacks">What are the types of XSS attacks?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting#reflected-cross-site-scripting">Reflected cross-site scripting</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting#stored-cross-site-scripting">Stored cross-site scripting</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting#dom-based-cross-site-scripting">DOM-based cross-site scripting</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting#what-can-xss-be-used-for">What can XSS be used for?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting#impact-of-xss-vulnerabilities">Impact of XSS vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting#how-to-find-and-test-for-xss-vulnerabilities">How to find and test for XSS vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting#content-security-policy">Content security policy</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting#dangling-markup-injection">Dangling markup injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting#how-to-prevent-xss-attacks">How to prevent XSS attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting#common-questions-about-cross-site-scripting">Common questions about cross-site scripting</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/reflected">Reflected XSS</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/reflected#what-is-reflected-cross-site-scripting">What is reflected cross-site scripting?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/reflected#impact-of-reflected-xss-attacks">Impact of reflected XSS attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/reflected#reflected-xss-in-different-contexts">Reflected XSS in different contexts</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/reflected#how-to-find-and-test-for-reflected-xss-vulnerabilities">How to find and test for reflected XSS vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/reflected#common-questions-about-reflected-cross-site-scripting">Common questions about reflected cross-site scripting</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/stored">Stored XSS</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/stored#what-is-stored-cross-site-scripting">What is stored cross-site scripting?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/stored#impact-of-stored-xss-attacks">Impact of stored XSS attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/stored#stored-xss-in-different-contexts">Stored XSS in different contexts</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/stored#how-to-find-and-test-for-stored-xss-vulnerabilities">How to find and test for stored XSS vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/dom-based">DOM-based XSS</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/dom-based#what-is-dom-based-cross-site-scripting">What is DOM-based cross-site scripting?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/dom-based#how-to-test-for-dom-based-cross-site-scripting">How to test for DOM-based cross-site scripting</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/dom-based#testing-html-sinks">Testing HTML sinks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/dom-based#testing-javascript-execution-sinks">Testing JavaScript execution sinks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/dom-based#testing-for-dom-xss-using-dom-invader">Testing for DOM XSS using DOM Invader</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/dom-based#exploiting-dom-xss-with-different-sources-and-sinks">Exploiting DOM XSS with different sources and sinks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/dom-based#sources-and-sinks-in-third-party-dependencies">Sources and sinks in third-party dependencies</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/dom-based#dom-xss-in-jquery">DOM XSS in jQuery</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/dom-based#dom-xss-in-angularjs">DOM XSS in AngularJS</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/dom-based#dom-xss-combined-with-reflected-and-stored-data">DOM XSS combined with reflected and stored data</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/dom-based#which-sinks-can-lead-to-dom-xss-vulnerabilities">Which sinks can lead to DOM-XSS vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/dom-based#how-to-prevent-dom-xss-vulnerabilities">How to prevent DOM-XSS vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/contexts">Cross-site scripting contexts</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/contexts#xss-between-html-tags">XSS between HTML tags</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/contexts#xss-in-html-tag-attributes">XSS in HTML tag attributes</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/contexts#xss-into-javascript">XSS into JavaScript</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/contexts#terminating-the-existing-script">Terminating the existing script</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/contexts#breaking-out-of-a-javascript-string">Breaking out of a JavaScript string</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/contexts#making-use-of-html-encoding">Making use of HTML-encoding</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/contexts#xss-in-javascript-template-literals">XSS in JavaScript template literals</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/contexts#xss-via-client-side-template-injection">XSS via client-side template injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/contexts/client-side-template-injection">Client-side template injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#what-is-client-side-template-injection">What is client-side template injection?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#what-is-the-angularjs-sandbox">What is the AngularJS sandbox?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#how-does-the-angularjs-sandbox-work">How does the AngularJS sandbox work?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#how-does-an-angularjs-sandbox-escape-work">How does an AngularJS sandbox escape work?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#constructing-an-advanced-angularjs-sandbox-escape">Constructing an advanced AngularJS sandbox escape</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#how-does-an-angularjs-csp-bypass-work">How does an AngularJS CSP bypass work?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#bypassing-a-csp-with-an-angularjs-sandbox-escape">Bypassing a CSP with an AngularJS sandbox escape</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#how-to-prevent-client-side-template-injection-vulnerabilities">How to prevent client-side template injection vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/exploiting">Exploiting cross-site scripting vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/exploiting#exploiting-cross-site-scripting-to-steal-cookies">Exploiting cross-site scripting to steal cookies</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/exploiting#exploiting-cross-site-scripting-to-capture-passwords">Exploiting cross-site scripting to capture passwords</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/exploiting#exploiting-cross-site-scripting-to-bypass-csrf-protections">Exploiting cross-site scripting to perform CSRF</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/dangling-markup">Dangling markup injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/dangling-markup#what-is-dangling-markup-injection">What is dangling markup injection?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/dangling-markup#how-to-prevent-dangling-markup-attacks">How to prevent dangling markup attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/content-security-policy">Content security policy</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/content-security-policy#what-is-csp-content-security-policy">What is CSP (content security policy)?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/content-security-policy#mitigating-xss-attacks-using-csp">Mitigating XSS attacks using CSP</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/content-security-policy#mitigating-dangling-markup-attacks-using-csp">Mitigating dangling markup attacks using CSP</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/content-security-policy#bypassing-csp-with-policy-injection">Bypassing CSP with policy injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/content-security-policy#protecting-against-clickjacking-using-csp">Protecting against clickjacking using CSP</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/preventing">How to prevent XSS</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/preventing#encode-data-on-output">Encode data on output</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/preventing#validate-input-on-arrival">Validate input on arrival</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/preventing#whitelisting-vs-blacklisting">Whitelisting vs blacklisting</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/preventing#allowing-safe-html">Allowing "safe" HTML</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/preventing#how-to-prevent-xss-using-a-template-engine">How to prevent XSS using a template engine</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/preventing#how-to-prevent-xss-in-php">How to prevent XSS in PHP</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/preventing#how-to-prevent-xss-client-side-in-javascript">How to prevent XSS client-side in JavaScript</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/preventing#how-to-prevent-xss-in-jquery">How to prevent XSS in jQuery</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/preventing#mitigating-xss-using-content-security-policy-csp">Mitigating XSS using content security policy (CSP)</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/cheat-sheet">Cross-site scripting (XSS) cheat sheet</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#event-handlers">Event handlers</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#event-handlers-that-do-not-require-user-interaction">Event handlers that do not require user interaction</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#event-handlers-that-do-require-user-interaction">Event handlers that do require user interaction</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#consuming-tags">Consuming tags</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#file-upload-attacks">File upload attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#restricted-characters">Restricted characters</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#frameworks">Frameworks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#protocols">Protocols</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#other-useful-attributes">Other useful attributes</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#special-tags">Special tags</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#encoding">Encoding</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#obfuscation">Obfuscation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#client-side-template-injection">Client-side template injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#vuejs-reflected">VueJS reflected</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#angularjs-sandbox-escapes-reflected">AngularJS sandbox escapes reflected</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#dom-based-angularjs-sandbox-escapes">DOM based AngularJS sandbox escapes</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#angularjs-csp-bypasses">AngularJS CSP bypasses</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#scriptless-attacks">Scriptless attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#dangling-markup">Dangling markup</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#polyglots">Polyglots</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#waf-bypass-global-objects">WAF bypass global objects</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#content-types">Content types</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#response-content-types">Response content types</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#impossible-labs">Impossible labs</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#prototype-pollution">Prototype pollution</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/cheat-sheet#classic-vectors-xss-crypt">Classic vectors (XSS crypt)</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/csrf">Cross-site request forgery (CSRF)</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/csrf#what-is-csrf">What is CSRF?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/csrf#what-is-the-impact-of-a-csrf-attack">What is the impact of a CSRF attack?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/csrf#how-does-csrf-work">How does CSRF work?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/csrf#how-to-construct-a-csrf-attack">How to construct a CSRF attack</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/csrf#how-to-deliver-a-csrf-exploit">How to deliver a CSRF exploit</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/csrf#common-defences-against-csrf">Common defences against CSRF</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/csrf/xss-vs-csrf">XSS vs CSRF</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/csrf/xss-vs-csrf#what-is-the-difference-between-xss-and-csrf">What is the difference between XSS and CSRF?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/csrf/xss-vs-csrf#can-csrf-tokens-prevent-xss-attacks">Can CSRF tokens prevent XSS attacks?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/csrf/bypassing-token-validation">Bypassing CSRF token validation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/csrf/bypassing-token-validation#what-is-a-csrf-token">What is a CSRF token?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/csrf/bypassing-token-validation#common-flaws-in-csrf-token-validation">Common flaws in CSRF token validation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/csrf/bypassing-token-validation#validation-of-csrf-token-depends-on-request-method">Validation of CSRF token depends on request method</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/csrf/bypassing-token-validation#validation-of-csrf-token-depends-on-token-being-present">Validation of CSRF token depends on token being present</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/csrf/bypassing-token-validation#csrf-token-is-not-tied-to-the-user-session">CSRF token is not tied to the user session</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/csrf/bypassing-token-validation#csrf-token-is-tied-to-a-non-session-cookie">CSRF token is tied to a non-session cookie</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/csrf/bypassing-token-validation#csrf-token-is-simply-duplicated-in-a-cookie">CSRF token is simply duplicated in a cookie</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/csrf/bypassing-samesite-restrictions">Bypassing SameSite cookie restrictions</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/csrf/bypassing-samesite-restrictions#what-is-a-site-in-the-context-of-samesite-cookies">What is a site in the context of SameSite cookies?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/csrf/bypassing-samesite-restrictions#what-s-the-difference-between-a-site-and-an-origin">What's the difference between a site and an origin?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/csrf/bypassing-samesite-restrictions#how-does-samesite-work">How does SameSite work?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/csrf/bypassing-samesite-restrictions#strict">Strict</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/csrf/bypassing-samesite-restrictions#lax">Lax</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/csrf/bypassing-samesite-restrictions#none">None</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/csrf/bypassing-samesite-restrictions#bypassing-samesite-lax-restrictions-using-get-requests">Bypassing SameSite Lax restrictions using GET requests</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/csrf/bypassing-samesite-restrictions#bypassing-samesite-restrictions-using-on-site-gadgets">Bypassing SameSite restrictions using on-site gadgets</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/csrf/bypassing-samesite-restrictions#bypassing-samesite-restrictions-via-vulnerable-sibling-domains">Bypassing SameSite restrictions via vulnerable sibling domains</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/csrf/bypassing-referer-based-defenses">Bypassing Referer-based CSRF defenses</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/csrf/bypassing-referer-based-defenses#validation-of-referer-depends-on-header-being-present">Validation of Referer depends on header being present</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/csrf/bypassing-referer-based-defenses#validation-of-referer-can-be-circumvented">Validation of Referer can be circumvented</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/csrf/preventing">How to prevent CSRF vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/csrf/preventing#use-csrf-tokens">Use CSRF tokens</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/csrf/preventing#how-should-csrf-tokens-be-generated">How should CSRF tokens be generated?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/csrf/preventing#how-should-csrf-tokens-be-transmitted">How should CSRF tokens be transmitted?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/csrf/preventing#how-should-csrf-tokens-be-validated">How should CSRF tokens be validated?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/csrf/preventing#use-strict-samesite-cookie-restrictions">Use Strict SameSite cookie restrictions</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/csrf/preventing#be-wary-of-cross-origin-same-site-attacks">Be wary of cross-origin, same-site attacks</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/xxe">XML external entity (XXE) injection</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/xxe#what-is-xml-external-entity-injection">What is XML external entity injection?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/xxe#how-do-xxe-vulnerabilities-arise">How do XXE vulnerabilities arise?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/xxe#what-are-the-types-of-xxe-attacks">What are the types of XXE attacks?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/xxe#exploiting-xxe-to-retrieve-files">Exploiting XXE to retrieve files</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/xxe#exploiting-xxe-to-perform-ssrf-attacks">Exploiting XXE to perform SSRF attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/xxe#blind-xxe-vulnerabilities">Blind XXE vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/xxe#finding-hidden-attack-surface-for-xxe-injection">Finding hidden attack surface for XXE injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/xxe#xinclude-attacks">XInclude attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/xxe#xxe-attacks-via-file-upload">XXE attacks via file upload</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/xxe#xxe-attacks-via-modified-content-type">XXE attacks via modified content type</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/xxe#how-to-find-and-test-for-xxe-vulnerabilities">How to find and test for XXE vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/xxe#how-to-prevent-xxe-vulnerabilities">How to prevent XXE vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/xxe/xml-entities">XML entities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/xxe/xml-entities#what-is-xml">What is XML?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/xxe/xml-entities#what-are-xml-entities">What are XML entities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/xxe/xml-entities#what-is-document-type-definition">What is document type definition?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/xxe/xml-entities#what-are-xml-custom-entities">What are XML custom entities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/xxe/xml-entities#what-are-xml-external-entities">What are XML external entities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/xxe/blind">Finding and exploiting blind XXE vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/xxe/blind#what-is-blind-xxe">What is blind XXE?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/xxe/blind#detecting-blind-xxe-using-out-of-band-oast-techniques">Detecting blind XXE using out-of-band (OAST) techniques</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/xxe/blind#exploiting-blind-xxe-to-exfiltrate-data-out-of-band">Exploiting blind XXE to exfiltrate data out-of-band</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/xxe/blind#exploiting-blind-xxe-to-retrieve-data-via-error-messages">Exploiting blind XXE to retrieve data via error messages</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/xxe/blind#exploiting-blind-xxe-by-repurposing-a-local-dtd">Exploiting blind XXE by repurposing a local DTD</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/xxe/blind#locating-an-existing-dtd-file-to-repurpose">Locating an existing DTD file to repurpose</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/clickjacking">Clickjacking (UI redressing)</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/clickjacking#what-is-clickjacking">What is clickjacking?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/clickjacking#how-to-construct-a-basic-clickjacking-attack">How to construct a basic clickjacking attack</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/clickjacking#clickbandit">Clickbandit</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/clickjacking#clickjacking-with-prefilled-form-input">Clickjacking with prefilled form input</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/clickjacking#frame-busting-scripts">Frame busting scripts</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/clickjacking#combining-clickjacking-with-a-dom-xss-attack">Combining clickjacking with a DOM XSS attack</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/clickjacking#multistep-clickjacking">Multistep clickjacking</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/clickjacking#how-to-prevent-clickjacking-attacks">How to prevent clickjacking attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/clickjacking#x-frame-options">X-Frame-Options</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/clickjacking#content-security-policy-csp">Content Security Policy (CSP)</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/cors">Cross-origin resource sharing (CORS)</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cors#what-is-cors-cross-origin-resource-sharing">What is CORS (cross-origin resource sharing)?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cors#same-origin-policy">Same-origin policy</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cors#relaxation-of-the-same-origin-policy">Relaxation of the same-origin policy</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cors#vulnerabilities-arising-from-cors-configuration-issues">Vulnerabilities arising from CORS configuration issues</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors#server-generated-acao-header-from-client-specified-origin-header">Server-generated ACAO header from client-specified Origin header</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors#errors-parsing-origin-headers">Errors parsing Origin headers</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors#whitelisted-null-origin-value">Whitelisted null origin value</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors#exploiting-xss-via-cors-trust-relationships">Exploiting XSS via CORS trust relationships</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors#breaking-tls-with-poorly-configured-cors">Breaking TLS with poorly configured CORS</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors#intranets-and-cors-without-credentials">Intranets and CORS without credentials</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cors#how-to-prevent-cors-based-attacks">How to prevent CORS-based attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors#proper-configuration-of-cross-origin-requests">Proper configuration of cross-origin requests</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors#only-allow-trusted-sites">Only allow trusted sites</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors#avoid-whitelisting-null">Avoid whitelisting null</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors#avoid-wildcards-in-internal-networks">Avoid wildcards in internal networks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors#cors-is-not-a-substitute-for-server-side-security-policies">CORS is not a substitute for server-side security policies</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cors/same-origin-policy">Same-origin policy (SOP)</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors/same-origin-policy#what-is-the-same-origin-policy">What is the same-origin policy?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors/same-origin-policy#why-is-the-same-origin-policy-necessary">Why is the same-origin policy necessary?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors/same-origin-policy#how-is-the-same-origin-policy-implemented">How is the same-origin policy implemented?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cors/access-control-allow-origin">CORS and the Access-Control-Allow-Origin response header</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors/access-control-allow-origin#what-is-the-access-control-allow-origin-response-header">What is the Access-Control-Allow-Origin response header?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors/access-control-allow-origin#implementing-simple-cross-origin-resource-sharing">Implementing simple cross-origin resource sharing</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors/access-control-allow-origin#handling-cross-origin-resource-requests-with-credentials">Handling cross-origin resource requests with credentials</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors/access-control-allow-origin#relaxation-of-cors-specifications-with-wildcards">Relaxation of CORS specifications with wildcards</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors/access-control-allow-origin#pre-flight-checks">Pre-flight checks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cors/access-control-allow-origin#does-cors-protect-against-csrf">Does CORS protect against CSRF?</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/ssrf">Server-side request forgery (SSRF)</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/ssrf#what-is-ssrf">What is SSRF?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/ssrf#labs">Labs</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/ssrf#what-is-the-impact-of-ssrf-attacks">What is the impact of SSRF attacks?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/ssrf#common-ssrf-attacks">Common SSRF attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/ssrf#ssrf-attacks-against-the-server">SSRF attacks against the server</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/ssrf#ssrf-attacks-against-other-back-end-systems">SSRF attacks against other back-end systems</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/ssrf#circumventing-common-ssrf-defenses">Circumventing common SSRF defenses</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/ssrf#ssrf-with-blacklist-based-input-filters">SSRF with blacklist-based input filters</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/ssrf#ssrf-with-whitelist-based-input-filters">SSRF with whitelist-based input filters</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/ssrf#bypassing-ssrf-filters-via-open-redirection">Bypassing SSRF filters via open redirection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/ssrf#blind-ssrf-vulnerabilities">Blind SSRF vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/ssrf#finding-hidden-attack-surface-for-ssrf-vulnerabilities">Finding hidden attack surface for SSRF vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/ssrf#partial-urls-in-requests">Partial URLs in requests</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/ssrf#urls-within-data-formats">URLs within data formats</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/ssrf#ssrf-via-the-referer-header">SSRF via the Referer header</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/ssrf/blind">Blind SSRF vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/ssrf/blind#what-is-blind-ssrf">What is blind SSRF?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/ssrf/blind#what-is-the-impact-of-blind-ssrf-vulnerabilities">What is the impact of blind SSRF vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/ssrf/blind#how-to-find-and-exploit-blind-ssrf-vulnerabilities">How to find and exploit blind SSRF vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/request-smuggling">HTTP request smuggling</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/request-smuggling#what-is-http-request-smuggling">What is HTTP request smuggling?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/request-smuggling#what-happens-in-an-http-request-smuggling-attack">What happens in an HTTP request smuggling attack?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/request-smuggling#how-do-http-request-smuggling-vulnerabilities-arise">How do HTTP request smuggling vulnerabilities arise?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/request-smuggling#how-to-perform-an-http-request-smuggling-attack">How to perform an HTTP request smuggling attack</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling#cl-te-vulnerabilities">CL.TE vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling#te-cl-vulnerabilities">TE.CL vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling#te-te-behavior-obfuscating-the-te-header">TE.TE behavior: obfuscating the TE header</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/request-smuggling#how-to-identify-http-request-smuggling-vulnerabilities">How to identify HTTP request smuggling vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/request-smuggling#how-to-exploit-http-request-smuggling-vulnerabilities">How to exploit HTTP request smuggling vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/request-smuggling#advanced-http-request-smuggling">Advanced HTTP request smuggling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/request-smuggling#browser-powered-request-smuggling">Browser-powered request smuggling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/request-smuggling#how-to-prevent-http-request-smuggling-vulnerabilities">How to prevent HTTP request smuggling vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/request-smuggling/finding">Finding HTTP request smuggling vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/finding#finding-http-request-smuggling-vulnerabilities-using-timing-techniques">Finding HTTP request smuggling vulnerabilities using timing techniques</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/finding#finding-cl-te-vulnerabilities-using-timing-techniques">Finding CL.TE vulnerabilities using timing techniques</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/finding#finding-te-cl-vulnerabilities-using-timing-techniques">Finding TE.CL vulnerabilities using timing techniques</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/finding#confirming-http-request-smuggling-vulnerabilities-using-differential-responses">Confirming HTTP request smuggling vulnerabilities using differential responses</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/finding#confirming-cl-te-vulnerabilities-using-differential-responses">Confirming CL.TE vulnerabilities using differential responses</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/finding#confirming-te-cl-vulnerabilities-using-differential-responses">Confirming TE.CL vulnerabilities using differential responses</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/request-smuggling/exploiting">Exploiting HTTP request smuggling vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/exploiting#using-http-request-smuggling-to-bypass-front-end-security-controls">Using HTTP request smuggling to bypass front-end security controls</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/exploiting#revealing-front-end-request-rewriting">Revealing front-end request rewriting</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/exploiting#bypassing-client-authentication">Bypassing client authentication</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/exploiting#capturing-other-users-requests">Capturing other users' requests</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/exploiting#using-http-request-smuggling-to-exploit-reflected-xss">Using HTTP request smuggling to exploit reflected XSS</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/exploiting#using-http-request-smuggling-to-turn-an-on-site-redirect-into-an-open-redirect">Using HTTP request smuggling to turn an on-site redirect into an open redirect</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/exploiting#turning-root-relative-redirects-into-open-redirects">Turning root-relative redirects into open redirects</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/exploiting#using-http-request-smuggling-to-perform-web-cache-poisoning">Using HTTP request smuggling to perform web cache poisoning</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/exploiting#using-http-request-smuggling-to-perform-web-cache-deception">Using HTTP request smuggling to perform web cache deception</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/request-smuggling/advanced">Advanced request smuggling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/advanced#http-2-request-smuggling">HTTP/2 request smuggling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/advanced#http-2-message-length">HTTP/2 message length</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/advanced#http-2-downgrading">HTTP/2 downgrading</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/advanced#h2-cl-vulnerabilities">H2.CL vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/advanced#h2-te-vulnerabilities">H2.TE vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/advanced#hidden-http-2-support">Hidden HTTP/2 support</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/advanced#response-queue-poisoning">Response queue poisoning</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/advanced#request-smuggling-via-crlf-injection">Request smuggling via CRLF injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/advanced#http-2-request-splitting">HTTP/2 request splitting</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/advanced#accounting-for-front-end-rewriting">Accounting for front-end rewriting</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/advanced#http-request-tunnelling">HTTP request tunnelling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors">HTTP/2-exclusive vectors</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors#injecting-via-header-names">Injecting via header names</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors#injecting-via-pseudo-headers">Injecting via pseudo-headers</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors#supplying-an-ambiguous-host">Supplying an ambiguous host</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors#supplying-an-ambiguous-path">Supplying an ambiguous path</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors#injecting-a-full-request-line">Injecting a full request line</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors#injecting-a-url-prefix">Injecting a URL prefix</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors#injecting-newlines-into-pseudo-headers">Injecting newlines into pseudo-headers</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/advanced/response-queue-poisoning">Response queue poisoning</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/advanced/response-queue-poisoning#what-is-the-impact-of-response-queue-poisoning">What is the impact of response queue poisoning?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/advanced/response-queue-poisoning#how-to-construct-a-response-queue-poisoning-attack">How to construct a response queue poisoning attack</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/request-smuggling/advanced/response-queue-poisoning#understanding-the-aftermath-of-request-smuggling">Understanding the aftermath of request smuggling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/request-smuggling/advanced/response-queue-poisoning#smuggling-a-complete-request">Smuggling a complete request</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/request-smuggling/advanced/response-queue-poisoning#desynchronizing-the-response-queue">Desynchronizing the response queue</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/request-smuggling/advanced/response-queue-poisoning#stealing-other-users-responses">Stealing other users' responses</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/advanced/request-tunnelling">HTTP request tunnelling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/advanced/request-tunnelling#request-tunnelling-with-http-2">Request tunnelling with HTTP/2</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/advanced/request-tunnelling#leaking-internal-headers-via-http-2-request-tunnelling">Leaking internal headers via HTTP/2 request tunnelling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/advanced/request-tunnelling#blind-request-tunnelling">Blind request tunnelling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/advanced/request-tunnelling#non-blind-request-tunnelling-using-head">Non-blind request tunnelling using HEAD</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/advanced/request-tunnelling#web-cache-poisoning-via-http-2-request-tunnelling">Web cache poisoning via HTTP/2 request tunnelling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/advanced/http2-downgrading">HTTP/2 downgrading</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/advanced/http2-downgrading#what-risks-are-associated-with-http-2-downgrading">What risks are associated with HTTP/2 downgrading?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/request-smuggling/browser">Browser-powered request smuggling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/browser#cl-0-request-smuggling">CL.0 request smuggling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/browser#client-side-desync-attacks">Client-side desync attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/browser#pause-based-desync-attacks">Pause-based desync attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/browser/cl-0">CL.0 request smuggling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/browser/cl-0#testing-for-cl-0-vulnerabilities">Testing for CL.0 vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/browser/cl-0#eliciting-cl-0-behavior">Eliciting CL.0 behavior</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/browser/cl-0#exploiting-cl-0-vulnerabilities">Exploiting CL.0 vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/browser/cl-0#h2-0-vulnerabilities">H2.0 vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/browser/cl-0#how-to-prevent-cl-0-vulnerabilities">How to prevent CL.0 vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/browser/client-side-desync">Client-side desync attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/browser/client-side-desync#what-is-a-client-side-desync-attack">What is a client-side desync attack?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/browser/client-side-desync#testing-for-client-side-desync-vulnerabilities">Testing for client-side desync vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/request-smuggling/browser/client-side-desync#probing-for-client-side-desync-vectors">Probing for client-side desync vectors</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/request-smuggling/browser/client-side-desync#confirming-the-desync-vector-in-burp">Confirming the desync vector in Burp</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/request-smuggling/browser/client-side-desync#building-a-proof-of-concept-in-a-browser">Building a proof of concept in a browser</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/request-smuggling/browser/client-side-desync#handling-redirects">Handling redirects</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/browser/client-side-desync#exploiting-client-side-desync-vulnerabilities">Exploiting client-side desync vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/request-smuggling/browser/client-side-desync#client-side-variations-of-classic-attacks">Client-side variations of classic attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/request-smuggling/browser/client-side-desync#client-side-cache-poisoning">Client-side cache poisoning</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/browser/client-side-desync#poisoning-the-cache-with-a-redirect">Poisoning the cache with a redirect</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/browser/client-side-desync#triggering-the-resource-import">Triggering the resource import</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/browser/client-side-desync#delivering-a-payload">Delivering a payload</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/request-smuggling/browser/client-side-desync#pivoting-attacks-against-internal-infrastructure">Pivoting attacks against internal infrastructure</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/browser/client-side-desync#how-to-prevent-client-side-desync-vulnerabilities">How to prevent client-side desync vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/browser/pause-based-desync">Pause-based desync attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/browser/pause-based-desync#server-side-pause-based-desync">Server-side pause-based desync</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="1">
                    <a href="/web-security/request-smuggling/browser/pause-based-desync#testing-for-pause-based-cl-0-vulnerabilities">Testing for pause-based CL.0 vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/browser/pause-based-desync#client-side-pause-based-desync">Client-side pause-based desync</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/request-smuggling/browser/pause-based-desync#how-to-prevent-pause-based-desync-vulnerabilities">How to prevent pause-based desync vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/os-command-injection">OS command injection</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/os-command-injection#what-is-os-command-injection">What is OS command injection?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/os-command-injection#injecting-os-commands">Injecting OS commands</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/os-command-injection#useful-commands">Useful commands</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/os-command-injection#blind-os-command-injection-vulnerabilities">Blind OS command injection vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/os-command-injection#detecting-blind-os-command-injection-using-time-delays">Detecting blind OS command injection using time delays</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/os-command-injection#exploiting-blind-os-command-injection-by-redirecting-output">Exploiting blind OS command injection by redirecting output</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/os-command-injection#exploiting-blind-os-command-injection-using-out-of-band-oast-techniques">Exploiting blind OS command injection using out-of-band (OAST) techniques</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/os-command-injection#ways-of-injecting-os-commands">Ways of injecting OS commands</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/os-command-injection#how-to-prevent-os-command-injection-attacks">How to prevent OS command injection attacks</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/server-side-template-injection">Server-side template injection</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/server-side-template-injection#what-is-server-side-template-injection">What is server-side template injection?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/server-side-template-injection#what-is-the-impact-of-server-side-template-injection">What is the impact of server-side template injection?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/server-side-template-injection#how-do-server-side-template-injection-vulnerabilities-arise">How do server-side template injection vulnerabilities arise?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/server-side-template-injection#constructing-a-server-side-template-injection-attack">Constructing a server-side template injection attack</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/server-side-template-injection#detect">Detect</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/server-side-template-injection#identify">Identify</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/server-side-template-injection#exploit">Exploit</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/server-side-template-injection#how-to-prevent-server-side-template-injection-vulnerabilities">How to prevent server-side template injection vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/server-side-template-injection/exploiting">Exploiting server-side template injection vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/server-side-template-injection/exploiting#read">Read</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/server-side-template-injection/exploiting#learn-the-basic-template-syntax">Learn the basic template syntax</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/server-side-template-injection/exploiting#read-about-the-security-implications">Read about the security implications</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/server-side-template-injection/exploiting#look-for-known-exploits">Look for known exploits</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/server-side-template-injection/exploiting#explore">Explore</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/server-side-template-injection/exploiting#developer-supplied-objects">Developer-supplied objects</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/server-side-template-injection/exploiting#create-a-custom-attack">Create a custom attack</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/server-side-template-injection/exploiting#constructing-a-custom-exploit-using-an-object-chain">Constructing a custom exploit using an object chain</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/server-side-template-injection/exploiting#constructing-a-custom-exploit-using-developer-supplied-objects">Constructing a custom exploit using developer-supplied objects</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/deserialization">Insecure deserialization</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/deserialization#what-is-serialization">What is serialization?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/deserialization#serialization-vs-deserialization">Serialization vs deserialization</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/deserialization#what-is-insecure-deserialization">What is insecure deserialization?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/deserialization#how-do-insecure-deserialization-vulnerabilities-arise">How do insecure deserialization vulnerabilities arise?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/deserialization#what-is-the-impact-of-insecure-deserialization">What is the impact of insecure deserialization?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/deserialization#how-to-exploit-insecure-deserialization-vulnerabilities">How to exploit insecure deserialization vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/deserialization#how-to-prevent-insecure-deserialization-vulnerabilities">How to prevent insecure deserialization vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/deserialization/exploiting">Exploiting insecure deserialization vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/deserialization/exploiting#how-to-identify-insecure-deserialization">How to identify insecure deserialization</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/deserialization/exploiting#php-serialization-format">PHP serialization format</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/deserialization/exploiting#java-serialization-format">Java serialization format</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/deserialization/exploiting#manipulating-serialized-objects">Manipulating serialized objects</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/deserialization/exploiting#modifying-object-attributes">Modifying object attributes</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/deserialization/exploiting#modifying-data-types">Modifying data types</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/deserialization/exploiting#using-application-functionality">Using application functionality</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/deserialization/exploiting#magic-methods">Magic methods</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/deserialization/exploiting#injecting-arbitrary-objects">Injecting arbitrary objects</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/deserialization/exploiting#gadget-chains">Gadget chains</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/deserialization/exploiting#working-with-pre-built-gadget-chains">Working with pre-built gadget chains</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/deserialization/exploiting#working-with-documented-gadget-chains">Working with documented gadget chains</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/deserialization/exploiting#creating-your-own-exploit">Creating your own exploit</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/deserialization/exploiting#phar-deserialization">PHAR deserialization</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/deserialization/exploiting#exploiting-deserialization-using-memory-corruption">Exploiting deserialization using memory corruption</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/file-path-traversal">Path traversal</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/file-path-traversal#what-is-path-traversal">What is path traversal?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/file-path-traversal#reading-arbitrary-files-via-path-traversal">Reading arbitrary files via path traversal</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/file-path-traversal#common-obstacles-to-exploiting-path-traversal-vulnerabilities">Common obstacles to exploiting path traversal vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/file-path-traversal#how-to-prevent-a-path-traversal-attack">How to prevent a path traversal attack</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/access-control">Access control vulnerabilities and privilege escalation</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/access-control#what-is-access-control">What is access control?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/access-control#vertical-access-controls">Vertical access controls</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/access-control#horizontal-access-controls">Horizontal access controls</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/access-control#context-dependent-access-controls">Context-dependent access controls</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/access-control#examples-of-broken-access-controls">Examples of broken access controls</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/access-control#vertical-privilege-escalation">Vertical privilege escalation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/access-control#unprotected-functionality">Unprotected functionality</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/access-control#parameter-based-access-control-methods">Parameter-based access control methods</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/access-control#broken-access-control-resulting-from-platform-misconfiguration">Broken access control resulting from platform misconfiguration</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/access-control#broken-access-control-resulting-from-url-matching-discrepancies">Broken access control resulting from URL-matching discrepancies</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/access-control#horizontal-privilege-escalation">Horizontal privilege escalation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/access-control#horizontal-to-vertical-privilege-escalation">Horizontal to vertical privilege escalation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/access-control#insecure-direct-object-references">Insecure direct object references</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/access-control#access-control-vulnerabilities-in-multi-step-processes">Access control vulnerabilities in multi-step processes</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/access-control#referer-based-access-control">Referer-based access control</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/access-control#location-based-access-control">Location-based access control</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/access-control#how-to-prevent-access-control-vulnerabilities">How to prevent access control vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/access-control/idor">Insecure direct object references (IDOR)</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/access-control/idor#what-are-insecure-direct-object-references-idor">What are insecure direct object references (IDOR)?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/access-control/idor#idor-examples">IDOR examples</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/access-control/idor#idor-vulnerability-with-direct-reference-to-database-objects">IDOR vulnerability with direct reference to database objects</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/access-control/idor#idor-vulnerability-with-direct-reference-to-static-files">IDOR vulnerability with direct reference to static files</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/access-control/security-models">Access control security models</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/access-control/security-models#what-are-access-control-security-models">What are access control security models?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/access-control/security-models#programmatic-access-control">Programmatic access control</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/access-control/security-models#discretionary-access-control-dac">Discretionary access control (DAC)</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/access-control/security-models#mandatory-access-control-mac">Mandatory access control (MAC)</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/access-control/security-models#role-based-access-control-rbac">Role-based access control (RBAC)</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/authentication">Authentication vulnerabilities</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication#labs">Labs</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication#what-is-authentication">What is authentication?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication#what-is-the-difference-between-authentication-and-authorization">What is the difference between authentication and authorization?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication#how-do-authentication-vulnerabilities-arise">How do authentication vulnerabilities arise?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication#what-is-the-impact-of-vulnerable-authentication">What is the impact of vulnerable authentication?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication#vulnerabilities-in-authentication-mechanisms">Vulnerabilities in authentication mechanisms</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication#vulnerabilities-in-third-party-authentication-mechanisms">Vulnerabilities in third-party authentication mechanisms</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication#preventing-attacks-on-your-own-authentication-mechanisms">Preventing attacks on your own authentication mechanisms</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication/password-based">Vulnerabilities in password-based login</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication/password-based#brute-force-attacks">Brute-force attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/authentication/password-based#brute-forcing-usernames">Brute-forcing usernames</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/authentication/password-based#brute-forcing-passwords">Brute-forcing passwords</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/authentication/password-based#username-enumeration">Username enumeration</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication/password-based#flawed-brute-force-protection">Flawed brute-force protection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/authentication/password-based#account-locking">Account locking</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/authentication/password-based#user-rate-limiting">User rate limiting</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication/password-based#http-basic-authentication">HTTP basic authentication</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication/multi-factor">Vulnerabilities in multi-factor authentication</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication/multi-factor#two-factor-authentication-tokens">Two-factor authentication tokens</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication/multi-factor#bypassing-two-factor-authentication">Bypassing two-factor authentication</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication/multi-factor#flawed-two-factor-verification-logic">Flawed two-factor verification logic</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication/multi-factor#brute-forcing-2fa-verification-codes">Brute-forcing 2FA verification codes</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication/other-mechanisms">Vulnerabilities in other authentication mechanisms</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication/other-mechanisms#keeping-users-logged-in">Keeping users logged in</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication/other-mechanisms#resetting-user-passwords">Resetting user passwords</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/authentication/other-mechanisms#sending-passwords-by-email">Sending passwords by email</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/authentication/other-mechanisms#resetting-passwords-using-a-url">Resetting passwords using a URL</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication/other-mechanisms#changing-user-passwords">Changing user passwords</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication/securing">How to secure your authentication mechanisms</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication/securing#take-care-with-user-credentials">Take care with user credentials</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication/securing#don-t-count-on-users-for-security">Don't count on users for security</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication/securing#prevent-username-enumeration">Prevent username enumeration</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication/securing#implement-robust-brute-force-protection">Implement robust brute-force protection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication/securing#triple-check-your-verification-logic">Triple-check your verification logic</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication/securing#don-t-forget-supplementary-functionality">Don't forget supplementary functionality</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/authentication/securing#implement-proper-multi-factor-authentication">Implement proper multi-factor authentication</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication/auth-lab-usernames">Authentication lab usernames</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication/auth-lab-passwords">Authentication lab passwords</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/oauth">OAuth 2.0 authentication vulnerabilities</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/oauth#what-is-oauth">What is OAuth?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/oauth#how-does-oauth-2-0-work">How does OAuth 2.0 work?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/oauth#oauth-authentication">OAuth authentication</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/oauth#how-do-oauth-authentication-vulnerabilities-arise">How do OAuth authentication vulnerabilities arise?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/oauth#identifying-oauth-authentication">Identifying OAuth authentication</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/oauth#recon">Recon</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/oauth#exploiting-oauth-authentication-vulnerabilities">Exploiting OAuth authentication vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/oauth#vulnerabilities-in-the-oauth-client-application">Vulnerabilities in the OAuth client application</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/oauth#improper-implementation-of-the-implicit-grant-type">Improper implementation of the implicit grant type</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/oauth#flawed-csrf-protection">Flawed CSRF protection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/oauth#leaking-authorization-codes-and-access-tokens">Leaking authorization codes and access tokens</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/oauth#flawed-scope-validation">Flawed scope validation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/oauth#unverified-user-registration">Unverified user registration</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/oauth#extending-oauth-with-openid-connect">Extending OAuth with OpenID Connect</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/oauth#preventing-oauth-authentication-vulnerabilities">Preventing OAuth authentication vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/oauth/grant-types">OAuth grant types</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/oauth/grant-types#what-is-an-oauth-grant-type">What is an OAuth grant type?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/oauth/grant-types#oauth-scopes">OAuth scopes</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/oauth/grant-types#authorization-code-grant-type">Authorization code grant type</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/oauth/grant-types#implicit-grant-type">Implicit grant type</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/oauth/openid">OpenID Connect</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/oauth/openid#what-is-openid-connect">What is OpenID Connect?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/oauth/openid#how-does-openid-connect-work">How does OpenID Connect work?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/oauth/openid#openid-connect-roles">OpenID Connect roles</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/oauth/openid#openid-connect-claims-and-scopes">OpenID Connect claims and scopes</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/oauth/openid#id-token">ID token</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/oauth/openid#identifying-openid-connect">Identifying OpenID Connect</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/oauth/openid#openid-connect-vulnerabilities">OpenID Connect vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/oauth/openid#unprotected-dynamic-client-registration">Unprotected dynamic client registration</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/oauth/openid#allowing-authorization-requests-by-reference">Allowing authorization requests by reference</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/oauth/preventing">How to prevent OAuth authentication vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/oauth/preventing#for-oauth-service-providers">For OAuth service providers</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/oauth/preventing#for-oauth-client-applications">For OAuth client applications</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/logic-flaws">Business logic vulnerabilities</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/logic-flaws#what-are-business-logic-vulnerabilities">What are business logic vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/logic-flaws#how-do-business-logic-vulnerabilities-arise">How do business logic vulnerabilities arise?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/logic-flaws#what-is-the-impact-of-business-logic-vulnerabilities">What is the impact of business logic vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/logic-flaws#what-are-some-examples-of-business-logic-vulnerabilities">What are some examples of business logic vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/logic-flaws#how-to-prevent-business-logic-vulnerabilities">How to prevent business logic vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/logic-flaws/examples">Examples of business logic vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/logic-flaws/examples#excessive-trust-in-client-side-controls">Excessive trust in client-side controls</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/logic-flaws/examples#failing-to-handle-unconventional-input">Failing to handle unconventional input</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/logic-flaws/examples#making-flawed-assumptions-about-user-behavior">Making flawed assumptions about user behavior</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/logic-flaws/examples#trusted-users-won-t-always-remain-trustworthy">Trusted users won't always remain trustworthy</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/logic-flaws/examples#users-won-t-always-supply-mandatory-input">Users won't always supply mandatory input</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/logic-flaws/examples#users-won-t-always-follow-the-intended-sequence">Users won't always follow the intended sequence</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/logic-flaws/examples#domain-specific-flaws">Domain-specific flaws</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/logic-flaws/examples#providing-an-encryption-oracle">Providing an encryption oracle</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/websockets">Testing for WebSockets security vulnerabilities</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/websockets#websockets">WebSockets</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/websockets#manipulating-websocket-traffic">Manipulating WebSocket traffic</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/websockets#intercepting-and-modifying-websocket-messages">Intercepting and modifying WebSocket messages</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/websockets#replaying-and-generating-new-websocket-messages">Replaying and generating new WebSocket messages</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/websockets#manipulating-websocket-connections">Manipulating WebSocket connections</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/websockets#websockets-security-vulnerabilities">WebSockets security vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/websockets#manipulating-websocket-messages-to-exploit-vulnerabilities">Manipulating WebSocket messages to exploit vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/websockets#manipulating-the-websocket-handshake-to-exploit-vulnerabilities">Manipulating the WebSocket handshake to exploit vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/websockets#using-cross-site-websockets-to-exploit-vulnerabilities">Using cross-site WebSockets to exploit vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/websockets#how-to-secure-a-websocket-connection">How to secure a WebSocket connection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/websockets/what-are-websockets">What are WebSockets?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/websockets/what-are-websockets#what-is-the-difference-between-http-and-websockets">What is the difference between HTTP and WebSockets?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/websockets/what-are-websockets#how-are-websocket-connections-established">How are WebSocket connections established?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/websockets/what-are-websockets#what-do-websocket-messages-look-like">What do WebSocket messages look like?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/websockets/cross-site-websocket-hijacking">Cross-site WebSocket hijacking</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/websockets/cross-site-websocket-hijacking#what-is-cross-site-websocket-hijacking">What is cross-site WebSocket hijacking?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/websockets/cross-site-websocket-hijacking#what-is-the-impact-of-cross-site-websocket-hijacking">What is the impact of cross-site WebSocket hijacking?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/websockets/cross-site-websocket-hijacking#performing-a-cross-site-websocket-hijacking-attack">Performing a cross-site WebSocket hijacking attack</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/dom-based">DOM-based vulnerabilities</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based#what-is-the-dom">What is the DOM?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based#taint-flow-vulnerabilities">Taint-flow vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based#what-is-taint-flow">What is taint flow?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based#common-sources">Common sources</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based#which-sinks-can-lead-to-dom-based-vulnerabilities">Which sinks can lead to DOM-based vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based#how-to-prevent-dom-based-taint-flow-vulnerabilities">How to prevent DOM-based taint-flow vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based#dom-clobbering">DOM clobbering</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/controlling-the-web-message-source">Controlling the web message source</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/controlling-the-web-message-source#what-is-the-impact-of-dom-based-web-message-vulnerabilities">What is the impact of DOM-based web message vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/controlling-the-web-message-source#how-to-construct-an-attack-using-web-messages-as-the-source">How to construct an attack using web messages as the source</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/controlling-the-web-message-source#origin-verification">Origin verification</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/controlling-the-web-message-source#which-sinks-can-lead-to-dom-based-web-message-vulnerabilities">Which sinks can lead to DOM-based web message vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/open-redirection">DOM-based open redirection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/open-redirection#what-is-dom-based-open-redirection">What is DOM-based open redirection?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/open-redirection#what-is-the-impact-of-dom-based-open-redirection">What is the impact of DOM-based open redirection?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/open-redirection#which-sinks-can-lead-to-dom-based-open-redirection-vulnerabilities">Which sinks can lead to DOM-based open-redirection vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/open-redirection#how-to-prevent-dom-based-open-redirection-vulnerabilities">How to prevent DOM-based open-redirection vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/cookie-manipulation">DOM-based cookie manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/cookie-manipulation#what-is-dom-based-cookie-manipulation">What is DOM-based cookie manipulation?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/cookie-manipulation#what-is-the-impact-of-a-dom-based-cookie-manipulation-attack">What is the impact of a DOM-based cookie-manipulation attack?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/cookie-manipulation#which-sinks-can-lead-to-dom-based-cookie-manipulation-vulnerabilities">Which sinks can lead to DOM-based cookie-manipulation vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/cookie-manipulation#how-to-prevent-dom-based-cookie-manipulation-vulnerabilities">How to prevent DOM-based cookie-manipulation vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/javascript-injection">DOM-based JavaScript injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/javascript-injection#what-is-dom-based-javascript-injection">What is DOM-based JavaScript injection?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/javascript-injection#what-is-the-impact-of-a-dom-based-javascript-injection-attack">What is the impact of a DOM-based JavaScript-injection attack?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/javascript-injection#which-sinks-can-lead-to-dom-based-javascript-injection-vulnerabilities">Which sinks can lead to DOM-based JavaScript-injection vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/javascript-injection#how-to-prevent-dom-based-javascript-injection-vulnerabilities">How to prevent DOM-based JavaScript-injection vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/document-domain-manipulation">DOM-based document-domain manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/document-domain-manipulation#what-is-dom-based-document-domain-manipulation">What is DOM-based document-domain manipulation?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/document-domain-manipulation#which-sinks-can-lead-to-dom-based-document-domain-manipulation-vulnerabilities">Which sinks can lead to DOM-based document-domain manipulation vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/document-domain-manipulation#how-to-prevent-dom-based-document-domain-manipulation-vulnerabilities">How to prevent DOM-based document-domain manipulation vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/websocket-url-poisoning">DOM-based WebSocket-URL poisoning</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/websocket-url-poisoning#what-is-dom-based-websocket-url-poisoning">What is DOM-based WebSocket-URL poisoning?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/websocket-url-poisoning#what-is-the-impact-of-websocket-url-poisoning">What is the impact of WebSocket-URL poisoning?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/websocket-url-poisoning#which-sinks-can-lead-to-websocket-url-poisoning-vulnerabilities">Which sinks can lead to WebSocket-URL poisoning vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/websocket-url-poisoning#how-to-prevent-dom-based-websocket-url-poisoning-vulnerabilities">How to prevent DOM-based WebSocket-URL poisoning vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/link-manipulation">DOM-based link manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/link-manipulation#what-is-dom-based-link-manipulation">What is DOM-based link manipulation?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/link-manipulation#what-is-the-impact-of-a-dom-based-link-manipulation-attack">What is the impact of a DOM-based link-manipulation attack?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/link-manipulation#which-sinks-can-lead-to-dom-based-link-manipulation-vulnerabilities">Which sinks can lead to DOM-based link-manipulation vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/link-manipulation#how-to-prevent-dom-based-link-manipulation-vulnerabilities">How to prevent DOM-based link-manipulation vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/web-message-manipulation">Web message manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/web-message-manipulation#what-is-dom-based-web-message-manipulation">What is DOM-based web message manipulation?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/web-message-manipulation#which-sinks-can-lead-to-dom-based-web-message-manipulation-vulnerabilities">Which sinks can lead to DOM-based web-message manipulation vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/web-message-manipulation#how-to-prevent-dom-based-web-message-manipulation">How to prevent DOM-based web message manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/ajax-request-header-manipulation">DOM-based Ajax request-header manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/ajax-request-header-manipulation#what-is-dom-based-ajax-request-header-manipulation">What is DOM-based Ajax request-header manipulation?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/ajax-request-header-manipulation#what-is-the-impact-of-dom-based-ajax-request-header-manipulation">What is the impact of DOM-based Ajax request-header manipulation?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/ajax-request-header-manipulation#which-sinks-can-lead-to-dom-based-ajax-request-header-manipulation-vulnerabilities">Which sinks can lead to DOM-based Ajax request-header manipulation vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/ajax-request-header-manipulation#how-to-prevent-dom-based-ajax-request-header-manipulation">How to prevent DOM-based Ajax request-header manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/local-file-path-manipulation">DOM-based local file-path manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/local-file-path-manipulation#what-is-dom-based-local-file-path-manipulation">What is DOM-based local file-path manipulation?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/local-file-path-manipulation#what-is-the-impact-of-dom-based-local-file-path-manipulation">What is the impact of DOM-based local file-path manipulation?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/local-file-path-manipulation#which-sinks-can-lead-to-dom-based-local-file-path-manipulation-vulnerabilities">Which sinks can lead to DOM-based local file-path manipulation vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/local-file-path-manipulation#how-to-prevent-dom-based-local-file-path-manipulation-vulnerabilities">How to prevent DOM-based local file-path manipulation vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/client-side-sql-injection">DOM-based client-side SQL injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/client-side-sql-injection#what-is-dom-based-client-side-sql-injection">What is DOM-based client-side SQL injection?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/client-side-sql-injection#what-is-the-impact-of-dom-based-client-side-sql-injection">What is the impact of DOM-based client-side SQL injection?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/client-side-sql-injection#which-sinks-can-lead-to-dom-based-client-side-sql-injection-vulnerabilities">Which sinks can lead to DOM-based client-side SQL-injection vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/client-side-sql-injection#how-to-prevent-dom-based-client-side-sql-injection-vulnerabilities">How to prevent DOM-based client-side SQL-injection vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/html5-storage-manipulation">DOM-based HTML5-storage manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/html5-storage-manipulation#what-is-dom-based-html5-storage-manipulation">What is DOM-based HTML5-storage manipulation?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/html5-storage-manipulation#which-sinks-can-lead-to-dom-based-html5-storage-manipulation-vulnerabilities">Which sinks can lead to DOM-based HTML5-storage manipulation vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/html5-storage-manipulation#how-to-prevent-dom-based-html5-storage-manipulation-vulnerabilities">How to prevent DOM-based HTML5-storage manipulation vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/client-side-xpath-injection">DOM-based client-side XPath injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/client-side-xpath-injection#what-is-dom-based-xpath-injection">What is DOM-based XPath injection?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/client-side-xpath-injection#what-is-the-impact-of-dom-based-xpath-injection">What is the impact of DOM-based XPath injection?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/client-side-xpath-injection#which-sinks-can-lead-to-xpath-injection-vulnerabilities">Which sinks can lead to XPath-injection vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/client-side-xpath-injection#how-to-prevent-dom-based-xpath-injection-vulnerabilities">How to prevent DOM-based XPath-injection vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/client-side-json-injection">DOM-based client-side JSON injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/client-side-json-injection#what-is-dom-based-json-injection">What is DOM-based JSON injection?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/client-side-json-injection#what-is-the-impact-of-a-dom-based-json-injection-attack">What is the impact of a DOM-based JSON-injection attack?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/client-side-json-injection#which-sinks-can-lead-to-dom-based-json-injection-vulnerabilities">Which sinks can lead to DOM-based JSON-injection vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/client-side-json-injection#how-to-prevent-client-side-json-injection-vulnerabilities">How to prevent client-side JSON-injection vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/dom-data-manipulation">DOM-data manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/dom-data-manipulation#what-is-dom-data-manipulation">What is DOM-data manipulation?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/dom-data-manipulation#what-is-the-impact-of-dom-data-manipulation">What is the impact of DOM-data manipulation?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/dom-data-manipulation#which-sinks-can-lead-to-dom-data-manipulation-vulnerabilities">Which sinks can lead to DOM-data manipulation vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/dom-data-manipulation#how-to-prevent-dom-data-manipulation-vulnerabilities">How to prevent DOM-data manipulation vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/denial-of-service">DOM-based denial of service</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/denial-of-service#what-is-dom-based-denial-of-service">What is DOM-based denial of service?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/denial-of-service#which-sinks-can-lead-to-dom-based-denial-of-service-vulnerabilities">Which sinks can lead to DOM-based denial-of-service vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/denial-of-service#how-to-prevent-dom-based-denial-of-service-vulnerabilities">How to prevent DOM-based denial-of-service vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/dom-clobbering">DOM clobbering</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/dom-clobbering#what-is-dom-clobbering">What is DOM clobbering?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/dom-clobbering#how-to-exploit-dom-clobbering-vulnerabilities">How to exploit DOM-clobbering vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/dom-based/dom-clobbering#how-to-prevent-dom-clobbering-attacks">How to prevent DOM-clobbering attacks</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/web-cache-poisoning">Web cache poisoning</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/web-cache-poisoning#what-is-web-cache-poisoning">What is web cache poisoning?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/web-cache-poisoning#web-cache-poisoning-research">Web cache poisoning research</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/web-cache-poisoning#how-does-a-web-cache-work">How does a web cache work?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/web-cache-poisoning#what-is-the-impact-of-a-web-cache-poisoning-attack">What is the impact of a web cache poisoning attack?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/web-cache-poisoning#constructing-a-web-cache-poisoning-attack">Constructing a web cache poisoning attack</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/web-cache-poisoning#identify-and-evaluate-unkeyed-inputs">Identify and evaluate unkeyed inputs</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/web-cache-poisoning#param-miner">Param Miner</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/web-cache-poisoning#elicit-a-harmful-response-from-the-back-end-server">Elicit a harmful response from the back-end server</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/web-cache-poisoning#get-the-response-cached">Get the response cached</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/web-cache-poisoning#exploiting-web-cache-poisoning-vulnerabilities">Exploiting web cache poisoning vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/web-cache-poisoning#how-to-prevent-web-cache-poisoning-vulnerabilities">How to prevent web cache poisoning vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/web-cache-poisoning/exploiting-design-flaws">Exploiting cache design flaws</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/web-cache-poisoning/exploiting-design-flaws#using-web-cache-poisoning-to-deliver-an-xss-attack">Using web cache poisoning to deliver an XSS attack</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/web-cache-poisoning/exploiting-design-flaws#using-web-cache-poisoning-to-exploit-unsafe-handling-of-resource-imports">Using web cache poisoning to exploit unsafe handling of resource imports</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/web-cache-poisoning/exploiting-design-flaws#using-web-cache-poisoning-to-exploit-cookie-handling-vulnerabilities">Using web cache poisoning to exploit cookie-handling vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/web-cache-poisoning/exploiting-design-flaws#using-multiple-headers-to-exploit-web-cache-poisoning-vulnerabilities">Using multiple headers to exploit web cache poisoning vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/web-cache-poisoning/exploiting-design-flaws#exploiting-responses-that-expose-too-much-information">Exploiting responses that expose too much information</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/web-cache-poisoning/exploiting-design-flaws#cache-control-directives">Cache-control directives</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/web-cache-poisoning/exploiting-design-flaws#vary-header">Vary header</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/web-cache-poisoning/exploiting-design-flaws#using-web-cache-poisoning-to-exploit-dom-based-vulnerabilities">Using web cache poisoning to exploit DOM-based vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/web-cache-poisoning/exploiting-design-flaws#chaining-web-cache-poisoning-vulnerabilities">Chaining web cache poisoning vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws">Exploiting cache implementation flaws</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#cache-key-flaws">Cache key flaws</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#cache-probing-methodology">Cache probing methodology</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#identify-a-suitable-cache-oracle">Identify a suitable cache oracle</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#probe-key-handling">Probe key handling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#identify-an-exploitable-gadget">Identify an exploitable gadget</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#exploiting-cache-key-flaws">Exploiting cache key flaws</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#unkeyed-port">Unkeyed port</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#unkeyed-query-string">Unkeyed query string</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#unkeyed-query-parameters">Unkeyed query parameters</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#cache-parameter-cloaking">Cache parameter cloaking</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#normalized-cache-keys">Normalized cache keys</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#cache-key-injection">Cache key injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#poisoning-internal-caches">Poisoning internal caches</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#how-to-identify-internal-caches">How to identify internal caches</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#testing-internal-caches-safely">Testing internal caches safely</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/host-header">HTTP Host header attacks</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/host-header#what-is-the-http-host-header">What is the HTTP Host header?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/host-header#what-is-the-purpose-of-the-http-host-header">What is the purpose of the HTTP Host header?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/host-header#virtual-hosting">Virtual hosting</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/host-header#routing-traffic-via-an-intermediary">Routing traffic via an intermediary</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/host-header#how-does-the-http-host-header-solve-this-problem">How does the HTTP Host header solve this problem?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/host-header#what-is-an-http-host-header-attack">What is an HTTP Host header attack?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/host-header#how-do-http-host-header-vulnerabilities-arise">How do HTTP Host header vulnerabilities arise?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/host-header#exploiting-http-host-header-vulnerabilities">Exploiting HTTP Host header vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/host-header#how-to-prevent-http-host-header-attacks">How to prevent HTTP Host header attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/host-header/exploiting">How to identify and exploit HTTP Host header vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/host-header/exploiting#how-to-test-for-vulnerabilities-using-the-http-host-header">How to test for vulnerabilities using the HTTP Host header</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/host-header/exploiting#supply-an-arbitrary-host-header">Supply an arbitrary Host header</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/host-header/exploiting#check-for-flawed-validation">Check for flawed validation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/host-header/exploiting#send-ambiguous-requests">Send ambiguous requests</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/host-header/exploiting#inject-host-override-headers">Inject host override headers</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/host-header/exploiting#how-to-exploit-the-http-host-header">How to exploit the HTTP Host header</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/host-header/exploiting#password-reset-poisoning">Password reset poisoning</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/host-header/exploiting#web-cache-poisoning-via-the-host-header">Web cache poisoning via the Host header</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/host-header/exploiting#exploiting-classic-server-side-vulnerabilities">Exploiting classic server-side vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/host-header/exploiting#accessing-restricted-functionality">Accessing restricted functionality</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/host-header/exploiting#accessing-internal-websites-with-virtual-host-brute-forcing">Accessing internal websites with virtual host brute-forcing</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/host-header/exploiting#routing-based-ssrf">Routing-based SSRF</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/host-header/exploiting#connection-state-attacks">Connection state attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/host-header/exploiting#ssrf-via-a-malformed-request-line">SSRF via a malformed request line</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/host-header/exploiting/password-reset-poisoning">Password reset poisoning</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/host-header/exploiting/password-reset-poisoning#how-does-a-password-reset-work">How does a password reset work?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/host-header/exploiting/password-reset-poisoning#how-to-construct-a-password-reset-poisoning-attack">How to construct a password reset poisoning attack</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/information-disclosure">Information disclosure vulnerabilities</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/information-disclosure#what-is-information-disclosure">What is information disclosure?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/information-disclosure#examples-of-information-disclosure">Examples of information disclosure</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/information-disclosure#how-do-information-disclosure-vulnerabilities-arise">How do information disclosure vulnerabilities arise?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/information-disclosure#what-is-the-impact-of-information-disclosure-vulnerabilities">What is the impact of information disclosure vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/information-disclosure#how-to-assess-the-severity-of-information-disclosure-vulnerabilities">How to assess the severity of information disclosure vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/information-disclosure#exploiting-information-disclosure">Exploiting information disclosure</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/information-disclosure#how-to-prevent-information-disclosure-vulnerabilities">How to prevent information disclosure vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/information-disclosure/exploiting">How to find and exploit information disclosure vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/information-disclosure/exploiting#how-to-test-for-information-disclosure-vulnerabilities">How to test for information disclosure vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/information-disclosure/exploiting#fuzzing">Fuzzing</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/information-disclosure/exploiting#using-burp-scanner">Using Burp Scanner</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/information-disclosure/exploiting#using-burp-s-engagement-tools">Using Burp's engagement tools</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/information-disclosure/exploiting#engineering-informative-responses">Engineering informative responses</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/information-disclosure/exploiting#common-sources-of-information-disclosure">Common sources of information disclosure</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/information-disclosure/exploiting#files-for-web-crawlers">Files for web crawlers</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/information-disclosure/exploiting#directory-listings">Directory listings</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/information-disclosure/exploiting#developer-comments">Developer comments</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/information-disclosure/exploiting#error-messages">Error messages</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/information-disclosure/exploiting#debugging-data">Debugging data</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/information-disclosure/exploiting#user-account-pages">User account pages</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/information-disclosure/exploiting#source-code-disclosure-via-backup-files">Source code disclosure via backup files</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/information-disclosure/exploiting#information-disclosure-due-to-insecure-configuration">Information disclosure due to insecure configuration</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/information-disclosure/exploiting#version-control-history">Version control history</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/file-upload">File upload vulnerabilities</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/file-upload#what-are-file-upload-vulnerabilities">What are file upload vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/file-upload#what-is-the-impact-of-file-upload-vulnerabilities">What is the impact of file upload vulnerabilities?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/file-upload#how-do-file-upload-vulnerabilities-arise">How do file upload vulnerabilities arise?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/file-upload#how-do-web-servers-handle-requests-for-static-files">How do web servers handle requests for static files?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/file-upload#exploiting-unrestricted-file-uploads-to-deploy-a-web-shell">Exploiting unrestricted file uploads to deploy a web shell</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/file-upload#exploiting-flawed-validation-of-file-uploads">Exploiting flawed validation of file uploads</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/file-upload#flawed-file-type-validation">Flawed file type validation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/file-upload#preventing-file-execution-in-user-accessible-directories">Preventing file execution in user-accessible directories</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/file-upload#insufficient-blacklisting-of-dangerous-file-types">Insufficient blacklisting of dangerous file types</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/file-upload#overriding-the-server-configuration">Overriding the server configuration</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/file-upload#obfuscating-file-extensions">Obfuscating file extensions</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/file-upload#flawed-validation-of-the-file-s-contents">Flawed validation of the file's contents</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/file-upload#exploiting-file-upload-race-conditions">Exploiting file upload race conditions</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/file-upload#race-conditions-in-url-based-file-uploads">Race conditions in URL-based file uploads</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/file-upload#exploiting-file-upload-vulnerabilities-without-remote-code-execution">Exploiting file upload vulnerabilities without remote code execution</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/file-upload#uploading-malicious-client-side-scripts">Uploading malicious client-side scripts</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/file-upload#exploiting-vulnerabilities-in-the-parsing-of-uploaded-files">Exploiting vulnerabilities in the parsing of uploaded files</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/file-upload#uploading-files-using-put">Uploading files using PUT</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/file-upload#how-to-prevent-file-upload-vulnerabilities">How to prevent file upload vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/jwt">JWT attacks</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/jwt#what-are-jwts">What are JWTs?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/jwt#jwt-format">JWT format</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/jwt#jwt-signature">JWT signature</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/jwt#jwt-vs-jws-vs-jwe">JWT vs JWS vs JWE</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/jwt#what-are-jwt-attacks">What are JWT attacks?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/jwt#what-is-the-impact-of-jwt-attacks">What is the impact of JWT attacks?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/jwt#how-do-vulnerabilities-to-jwt-attacks-arise">How do vulnerabilities to JWT attacks arise?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/jwt#how-to-work-with-jwts-in-burp-suite">How to work with JWTs in Burp Suite</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/jwt#exploiting-flawed-jwt-signature-verification">Exploiting flawed JWT signature verification</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/jwt#accepting-arbitrary-signatures">Accepting arbitrary signatures</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/jwt#accepting-tokens-with-no-signature">Accepting tokens with no signature</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/jwt#brute-forcing-secret-keys">Brute-forcing secret keys</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/jwt#brute-forcing-secret-keys-using-hashcat">Brute-forcing secret keys using hashcat</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/jwt#jwt-header-parameter-injections">JWT header parameter injections</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/jwt#injecting-self-signed-jwts-via-the-jwk-parameter">Injecting self-signed JWTs via the jwk parameter</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/jwt#injecting-self-signed-jwts-via-the-jku-parameter">Injecting self-signed JWTs via the jku parameter</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/jwt#injecting-self-signed-jwts-via-the-kid-parameter">Injecting self-signed JWTs via the kid parameter</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/jwt#other-interesting-jwt-header-parameters">Other interesting JWT header parameters</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/jwt#jwt-algorithm-confusion">JWT algorithm confusion</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/jwt#how-to-prevent-jwt-attacks">How to prevent JWT attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/jwt#additional-best-practice-for-jwt-handling">Additional best practice for JWT handling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/jwt/algorithm-confusion">Algorithm confusion attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/jwt/algorithm-confusion#symmetric-vs-asymmetric-algorithms">Symmetric vs asymmetric algorithms</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/jwt/algorithm-confusion#how-do-algorithm-confusion-vulnerabilities-arise">How do algorithm confusion vulnerabilities arise?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/jwt/algorithm-confusion#performing-an-algorithm-confusion-attack">Performing an algorithm confusion attack</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/jwt/algorithm-confusion#step-1-obtain-the-server-s-public-key">Step 1 - Obtain the server's public key</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/jwt/algorithm-confusion#step-2-convert-the-public-key-to-a-suitable-format">Step 2 - Convert the public key to a suitable format</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/jwt/algorithm-confusion#step-3-modify-your-jwt">Step 3 - Modify your JWT</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="2">
                    <a href="/web-security/jwt/algorithm-confusion#step-4-sign-the-jwt-using-the-public-key">Step 4 - Sign the JWT using the public key</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/jwt/algorithm-confusion#deriving-public-keys-from-existing-tokens">Deriving public keys from existing tokens</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/video-guidelines">Guidelines for submitting video solutions</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/video-guidelines#what-are-the-requirements-for-new-video-solutions">What are the requirements for new video solutions?</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/credits">Who is behind the Web Security Academy?</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/credits#community-contributions">Community contributions</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/credits#inspiration-from-the-community">Inspiration from the community</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/dashboard">Welcome back!</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dashboard#ready-for-your-next-challenge">Ready for your next challenge?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dashboard#can-we-help-you-get-started">Can we help you get started?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dashboard#want-the-latest-from-the-web-security-academy">Want the latest from the Web Security Academy?</a>
                </td>
            </tr>
        </table>
        
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
