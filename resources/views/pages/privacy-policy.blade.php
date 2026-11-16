@extends('layouts.app')

@section('title', 'Privacy Policy | Blogify')

@section('content')
<article class="mx-auto max-w-6xl">
    <header class="relative isolate overflow-hidden rounded-[2rem] bg-gradient-to-br from-red-700 via-red-700 to-rose-900 px-6 py-10 text-white shadow-xl shadow-red-950/10 sm:px-10 sm:py-14 lg:px-14">
        <div class="pointer-events-none absolute -right-20 -top-24 size-72 rounded-full border border-white/10"></div>
        <div class="relative max-w-3xl">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-red-100">Your information matters</p>
            <h1 class="mt-4 font-serif text-4xl font-bold tracking-tight sm:text-5xl">Privacy policy</h1>
            <p class="mt-4 text-base leading-7 text-red-100 sm:text-lg">A clear guide to the information used when you read, write, or take part in the Blogify community.</p>
            <p class="mt-5 text-xs font-semibold text-red-100">Last updated: November 9, 2026</p>
        </div>
    </header>

    <div class="mt-10 grid gap-10 lg:grid-cols-[220px_minmax(0,1fr)] lg:gap-14">
        <nav aria-label="Privacy policy sections" class="h-fit rounded-2xl border border-slate-200 bg-white p-5 shadow-sm lg:sticky lg:top-24">
            <h2 class="text-xs font-bold uppercase tracking-[0.16em] text-slate-500">On this page</h2>
            <ol class="mt-4 space-y-3 text-sm font-semibold text-slate-600">
                <li><a class="transition hover:text-red-700" href="#information">Information collected</a></li>
                <li><a class="transition hover:text-red-700" href="#use">How it is used</a></li>
                <li><a class="transition hover:text-red-700" href="#visibility">What is public</a></li>
                <li><a class="transition hover:text-red-700" href="#cookies">Sessions &amp; cookies</a></li>
                <li><a class="transition hover:text-red-700" href="#sharing">Sharing &amp; services</a></li>
                <li><a class="transition hover:text-red-700" href="#retention">Security &amp; retention</a></li>
                <li><a class="transition hover:text-red-700" href="#choices">Your choices</a></li>
            </ol>
        </nav>

        <div class="min-w-0">
            <div class="rounded-2xl border border-red-100 bg-red-50/70 p-5 text-sm leading-6 text-slate-700 sm:p-6">
                <p><strong class="text-slate-950">In short:</strong> Blogify uses account details to provide the service. Published posts and comments are public; your password is stored as a hash, not as readable text. We do not sell personal information.</p>
            </div>

            <div class="mt-8 divide-y divide-slate-200 border-y border-slate-200">
                <section id="information" class="scroll-mt-28 py-7 first:pt-0">
                    <h2 class="font-serif text-2xl font-bold text-slate-950">1. Information collected</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600 sm:text-base">When you register, Blogify processes the name, unique username, email address, account role, and password you provide. Passwords are stored in hashed form. If you add profile details, publish a post, save a draft, or comment, Blogify also stores that information and the associated account and timestamps.</p>
                </section>

                <section id="use" class="scroll-mt-28 py-7">
                    <h2 class="font-serif text-2xl font-bold text-slate-950">2. How information is used</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600 sm:text-base">Information is used to create and manage accounts, sign you in, provide reader and author features, show posts and discussions, maintain the site, and respond to support or safety requests. We do not sell your personal information.</p>
                </section>

                <section id="visibility" class="scroll-mt-28 py-7">
                    <h2 class="font-serif text-2xl font-bold text-slate-950">3. What is public</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600 sm:text-base">Your public profile address uses your unique username (for example, <code class="rounded bg-slate-100 px-1.5 py-0.5 text-sm text-slate-800">/@yourname</code>) and displays your name, username, optional bio, and published stories. Published posts and comments can be read by anyone, and your display name may appear with content you publish. Draft posts are not shown on the public blog while saved as drafts. Your sign-in password and account email are not displayed on your public profile. Avoid putting private or sensitive details into posts or comments.</p>
                </section>

                <section id="cookies" class="scroll-mt-28 py-7">
                    <h2 class="font-serif text-2xl font-bold text-slate-950">4. Sessions and cookies</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600 sm:text-base">Blogify uses a session to keep you signed in and protect account actions. Depending on the site’s deployment configuration, session and security records may include technical details such as an IP address, browser user-agent, and activity time. Blocking essential cookies may prevent sign-in or other features from working.</p>
                </section>

                <section id="sharing" class="scroll-mt-28 py-7">
                    <h2 class="font-serif text-2xl font-bold text-slate-950">5. Sharing and external services</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600 sm:text-base">Information may be processed by hosting, database, or infrastructure providers that are needed to run the site, or disclosed when required by law or to protect the service and its users. Blogify also loads typefaces from Google Fonts; when your browser requests those fonts, Google may receive technical request information under its own privacy terms.</p>
                </section>

                <section id="retention" class="scroll-mt-28 py-7">
                    <h2 class="font-serif text-2xl font-bold text-slate-950">6. Security and retention</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600 sm:text-base">Reasonable technical and organizational measures are used to protect information, but no online service can promise absolute security. Account and content information is retained while needed to operate Blogify; backups and technical records may remain for a limited period as part of normal operation or where required to address legal and security needs.</p>
                </section>

                <section id="choices" class="scroll-mt-28 py-7 last:pb-0">
                    <h2 class="font-serif text-2xl font-bold text-slate-950">7. Your choices and contact</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600 sm:text-base">You can choose what to include in public content. To ask about your account information, request a correction or removal, or raise a privacy concern, email <a href="mailto:kashanalikot@gmail.com" class="font-semibold text-red-700 underline decoration-red-200 underline-offset-4 hover:decoration-red-700">kashanalikot@gmail.com</a>. We may need to retain some information where required by law or for legitimate security and operational reasons.</p>
                    <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">We may update this policy when Blogify changes. The updated date and text will be posted on this page.</p>
                </section>
            </div>
        </div>
    </div>
</article>
@endsection
