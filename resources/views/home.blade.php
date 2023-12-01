@php use App\Models\Social; @endphp
<x-guest-layout>

    <div class="mx-auto max-w-2xl lg:max-w-5xl">
        <div class="max-w-2xl">
            <h1 class="text-4xl font-bold tracking-tight text-slate-800 dark:text-slate-100 sm:text-5xl">
                Backend Lead and Senior Fullstack Developer
            </h1>
            <p class="mt-6 text-base text-slate-600 dark:text-slate-300">
                Hello! I am Daniel, a Backend Lead and Senior Fullstack Developer from Norway. I have a passion for
                creating and developing digital solutions. Get to know
                <x-link-text link="">
                    <x-gradient-text>about me</x-gradient-text>
                </x-link-text>
                or
                <x-link-text link="">
                    <x-gradient-text>get in touch</x-gradient-text>
                </x-link-text>
                !
            </p>
            <div class="mt-6 flex gap-6">
                @foreach (Social::all() as $social)
                    <a class="group -m-1 p-1 text-slate-500 dark:text-slate-200 hover:text-slate-400" aria-label="Follow on {{$social->name}}"
                       href="{{$social->link}}">
                        <i class="{{$social->icon}} text-sm mr-1"></i>{{$social->name}}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="sm:px-8 mt-24 md:mt-28">
        <div class="mx-auto max-w-2xl lg:max-w-5xl grid grid-cols-1 gap-y-20 lg:grid-cols-2">
            <section id="blog" class="flex flex-col gap-16">
                @foreach ($posts as $post)
                    <article class="group relative flex flex-col items-start">
                        <h2 class="text-base font-bold tracking-tight text-slate-800 dark:text-slate-100">
                            <div class="absolute -inset-x-4 -inset-y-6 z-0 scale-95 bg-slate-50 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 dark:bg-slate-800/50 sm:-inset-x-6 sm:rounded-2xl"></div>
                            <a href="{{ route('blog.show', $post->slug) }}">
                                <span class="absolute -inset-x-4 -inset-y-6 z-20 sm:-inset-x-6 sm:rounded-2xl"></span>
                                <span class="relative z-10">{{ $post->title }}</span>
                            </a>
                        </h2>
                        <time
                            class="relative z-10 order-first mb-3 flex items-center text-sm text-slate-500 dark:text-slate-400 pl-3.5"
                            datetime="{{ $post->published_at->format('Y-m-d') }}">
                            <span class="absolute inset-y-0 left-0 flex items-center" aria-hidden="true">
                                <span class="h-4 w-0.5 rounded-full bg-slate-300 dark:bg-slate-400"></span>
                            </span>
                            {{ now()->subMonth(1) > $post->published_at ? $post->published_at->isoFormat('D. MMMM YYYY') : $post->published_at->diffForHumans() }}
                        </time>
                        <p class="relative z-10 mt-2 text-sm text-slate-600 dark:text-slate-400">{!! strip_tags(Str::of(Str::limit($post->body, 300))->markdown()) !!}</p>
                        <div aria-hidden="true" class="relative z-10 mt-4 flex items-center text-sm font-medium text-orange-500 dark:text-orange-400">
                            Read article
                            <svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="ml-1 h-4 w-4 stroke-current">
                                <path d="M6.75 5.75 9.25 8l-2.5 2.25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                    </article>
                @endforeach
            </section>
            <section class="space-y-10 lg:pl-16 xl:pl-24">
                {{--<form class="rounded-2xl border border-slate-100 p-6 dark:border-slate-700/40" action="/thank-you"
                      data-dashlane-rid="424ef476045e3cd4" data-form-type="other">
                    <h2 class="flex text-sm font-semibold text-slate-900 dark:text-slate-100">
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round"
                             stroke-linejoin="round" aria-hidden="true" class="h-6 w-6 flex-none">
                            <path
                                d="M2.75 7.75a3 3 0 0 1 3-3h12.5a3 3 0 0 1 3 3v8.5a3 3 0 0 1-3 3H5.75a3 3 0 0 1-3-3v-8.5Z"
                                class="fill-slate-100 stroke-slate-400 dark:fill-slate-100/10 dark:stroke-slate-500"></path>
                            <path d="m4 6 6.024 5.479a2.915 2.915 0 0 0 3.952 0L20 6"
                                  class="stroke-slate-400 dark:stroke-slate-500"></path>
                        </svg>
                        <span class="ml-3">Stay up to date</span></h2>
                    <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">Get notified when I publish something new,
                        and unsubscribe at any time.</p>
                    <div class="mt-6 flex"><input type="email" placeholder="Email address" aria-label="Email address"
                                                  required=""
                                                  class="min-w-0 flex-auto appearance-none rounded-md border border-slate-900/10 bg-white px-3 py-[calc(theme(spacing.2)-1px)] shadow-md shadow-slate-800/5 placeholder:text-slate-400 focus:border-teal-500 focus:outline-none focus:ring-4 focus:ring-teal-500/10 dark:border-slate-700 dark:bg-slate-700/[0.15] dark:text-slate-200 dark:placeholder:text-slate-500 dark:focus:border-teal-400 dark:focus:ring-teal-400/10 sm:text-sm"
                                                  data-dashlane-rid="6ef8a63ba5cb8058" data-form-type="email"
                                                  data-kwimpalastatus="alive" data-kwimpalaid="1701418315135-0">
                        <button
                            class="inline-flex items-center gap-2 justify-center rounded-md py-2 px-3 text-sm outline-offset-2 transition active:transition-none bg-slate-800 font-semibold text-slate-100 hover:bg-slate-700 active:bg-slate-800 active:text-slate-100/70 dark:bg-slate-700 dark:hover:bg-slate-600 dark:active:bg-slate-700 dark:active:text-slate-100/70 ml-4 flex-none"
                            type="submit" data-dashlane-rid="4c663953f9d172f7" data-form-type="other"
                            data-dashlane-label="true">Join
                        </button>
                    </div>
                </form>--}}
                <div class="rounded-2xl border border-slate-100 p-6 dark:border-slate-700/40">
                    <h2 class="flex text-sm font-semibold text-slate-900 dark:text-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 flex-none">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                        </svg>
                        <span class="ml-3">Experience</span>
                    </h2>
                    <ol class="mt-6 space-y-4">
                        <li class="flex gap-4">
                            <div class="relative mt-1 flex h-10 w-10 flex-none items-center justify-center rounded-full shadow-md shadow-slate-800/5 ring-1 ring-slate-900/5 dark:border dark:border-slate-700/50 dark:bg-slate-800 dark:ring-0">
                                <img alt="" loading="lazy" width="32" height="32" decoding="async" data-nimg="1" class="h-7 w-7" style="color:transparent" src="">
                            </div>
                            <dl class="flex flex-auto flex-wrap gap-x-2">
                                <dt class="sr-only">Company</dt>
                                <dd class="w-full flex-none text-sm font-medium text-slate-900 dark:text-slate-100">
                                    Kilobyte AS
                                </dd>
                                <dt class="sr-only">Role</dt>
                                <dd class="text-xs text-slate-500 dark:text-slate-400">Founder & Lead Developer</dd>
                                <dt class="sr-only">Date</dt>
                                <dd class="ml-auto text-xs text-slate-400 dark:text-slate-500"
                                    aria-label="2019 until Present">
                                    <time datetime="01-2022">Feb 2022</time>
                                    <span aria-hidden="true">&mdash;</span>
                                    <time datetime="2023">Present</time>
                                </dd>
                            </dl>
                        </li>
                    </ol>
                    <a class="inline-flex items-center gap-2 justify-center rounded-md py-2 px-3 text-sm outline-offset-2 transition active:transition-none bg-slate-50 font-medium text-slate-900 hover:bg-slate-100 active:bg-slate-100 active:text-slate-900/60 dark:bg-slate-800/50 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-slate-50 dark:active:bg-slate-800/50 dark:active:text-slate-50/70 group mt-6 w-full"
                       href="#">Download my CV
                        <svg aria-hidden="true"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4 stroke-slate-400 transition group-active:stroke-slate-600 dark:group-hover:stroke-slate-50 dark:group-active:stroke-slate-50">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                    </a>
                </div>
            </section>
        </div>
    </div>
</x-guest-layout>
