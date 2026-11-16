@extends('layouts.app')

@section('title', 'Terms & Conditions | Blogify')

@section('content')
<article class="mx-auto max-w-6xl">
    <header class="relative isolate overflow-hidden rounded-[2rem] bg-gradient-to-br from-red-700 via-red-700 to-rose-900 px-6 py-10 text-white shadow-xl shadow-red-950/10 sm:px-10 sm:py-14 lg:px-14">
        <div class="pointer-events-none absolute -right-20 -top-24 size-72 rounded-full border border-white/10"></div>
        <div class="relative max-w-3xl">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-red-100">A respectful community</p>
            <h1 class="mt-4 font-serif text-4xl font-bold tracking-tight sm:text-5xl">Terms &amp; conditions</h1>
            <p class="mt-4 text-base leading-7 text-red-100 sm:text-lg">The guidelines for using Blogify, publishing stories, and participating in the community.</p>
            <p class="mt-5 text-xs font-semibold text-red-100">Last updated: November 9, 2026</p>
        </div>
    </header>

    <div class="mt-10 grid gap-10 lg:grid-cols-[220px_minmax(0,1fr)] lg:gap-14">
        <nav aria-label="Terms and conditions sections" class="h-fit rounded-2xl border border-slate-200 bg-white p-5 shadow-sm lg:sticky lg:top-24">
            <h2 class="text-xs font-bold uppercase tracking-[0.16em] text-slate-500">On this page</h2>
            <ol class="mt-4 space-y-3 text-sm font-semibold text-slate-600">
                <li><a class="transition hover:text-red-700" href="#acceptance">Agreement</a></li>
                <li><a class="transition hover:text-red-700" href="#accounts">Accounts</a></li>
                <li><a class="transition hover:text-red-700" href="#content">Your content</a></li>
                <li><a class="transition hover:text-red-700" href="#conduct">Community rules</a></li>
                <li><a class="transition hover:text-red-700" href="#moderation">Moderation</a></li>
                <li><a class="transition hover:text-red-700" href="#service">Service &amp; liability</a></li>
                <li><a class="transition hover:text-red-700" href="#changes">Changes &amp; contact</a></li>
            </ol>
        </nav>

        <div class="min-w-0">
            <div class="rounded-2xl border border-red-100 bg-red-50/70 p-5 text-sm leading-6 text-slate-700 sm:p-6">
                <p><strong class="text-slate-950">In short:</strong> Use Blogify lawfully and respectfully. You remain responsible for content you submit, and public posts and comments can be viewed by anyone.</p>
            </div>

            <div class="mt-8 divide-y divide-slate-200 border-y border-slate-200">
                <section id="acceptance" class="scroll-mt-28 py-7 first:pt-0">
                    <h2 class="font-serif text-2xl font-bold text-slate-950">1. Agreement to these terms</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600 sm:text-base">These terms apply when you access or use Blogify. If you do not agree, do not use the service. You must follow applicable laws and these terms whenever you use the site.</p>
                </section>

                <section id="accounts" class="scroll-mt-28 py-7">
                    <h2 class="font-serif text-2xl font-bold text-slate-950">2. Accounts and access</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600 sm:text-base">Provide accurate registration information and take reasonable care of your sign-in details. You are responsible for activity carried out through your account and should contact us promptly if you believe it has been accessed without permission. Author tools are available according to the role assigned to your account.</p>
                </section>

                <section id="content" class="scroll-mt-28 py-7">
                    <h2 class="font-serif text-2xl font-bold text-slate-950">3. Your content and permissions</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600 sm:text-base">You keep ownership of content you create. You are responsible for ensuring that you have the rights and permissions needed to submit it. By submitting content, you give Blogify permission to store, format, display, and distribute it as necessary to operate and provide the service—for example, showing a published post and its discussion to readers.</p>
                    <p class="mt-3 text-sm leading-7 text-slate-600 sm:text-base">Do not submit confidential information as a public post or comment. Drafts are not displayed on the public blog while saved as drafts; content you publish may be copied, shared, or retained by people who can access it.</p>
                </section>

                <section id="conduct" class="scroll-mt-28 py-7">
                    <h2 class="font-serif text-2xl font-bold text-slate-950">4. Community rules</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600 sm:text-base">Do not use Blogify to break the law, infringe another person’s rights, harass or threaten people, impersonate others, distribute malicious code, spam the community, or interfere with the security or operation of the site. Keep comments relevant and respectful.</p>
                </section>

                <section id="moderation" class="scroll-mt-28 py-7">
                    <h2 class="font-serif text-2xl font-bold text-slate-950">5. Moderation and account restrictions</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600 sm:text-base">To protect the service and its users, Blogify may review reported issues and may remove content or restrict access when reasonably necessary—for example, where content appears to violate these terms or applicable law. Where appropriate, contact us to ask about a decision.</p>
                </section>

                <section id="service" class="scroll-mt-28 py-7">
                    <h2 class="font-serif text-2xl font-bold text-slate-950">6. Service availability and liability</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600 sm:text-base">Features may change, and access may occasionally be interrupted for maintenance, security, or other reasons. Keep your own copy of important work. Blogify is provided as available, without a promise that it will always be uninterrupted or error-free. Nothing in these terms limits a right or responsibility that cannot legally be excluded under applicable law.</p>
                </section>

                <section id="changes" class="scroll-mt-28 py-7 last:pb-0">
                    <h2 class="font-serif text-2xl font-bold text-slate-950">7. Changes and contact</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600 sm:text-base">We may update these terms as Blogify develops. The updated version and date will appear on this page. If a change materially affects your use, we will make reasonable efforts to bring it to your attention. Continuing to use the service after an update means you agree to the revised terms, to the extent permitted by applicable law.</p>
                    <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">Questions or concerns? Contact us at <a href="mailto:kashanalikot@gmail.com" class="font-semibold text-red-700 underline decoration-red-200 underline-offset-4 hover:decoration-red-700">kashanalikot@gmail.com</a>.</p>
                </section>
            </div>
        </div>
    </div>
</article>
@endsection
