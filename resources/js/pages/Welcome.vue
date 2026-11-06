
<script setup lang="ts">
import { ref } from 'vue'
import { Head, Link, router } from '@inertiajs/vue3'

import Navbar from '@/components/Shared/Navbar.vue'

const searchQuery = ref('')

interface Story {
    id: number
    title: string
    category: string
    age: string
    description: string
    cover: string
    icon: string
    premium: boolean
}

const featuredStories: Story[] = [
    {
        id: 1,
        title: 'আসহাবে উখদুদের গল্প',
        category: 'কুরআনের গল্প',
        age: '৮-১২ বছর',
        description: 'ঈমান, ধৈর্য এবং সত্যের পথে অবিচল থাকার হৃদয়স্পর্শী কাহিনি।',
        cover: 'from-emerald-950 via-green-800 to-emerald-700',
        icon: '🌙',
        premium: false,
    },
    {
        id: 2,
        title: 'একজন বুদ্ধিমান বালকের গল্প',
        category: 'নেককারদের গল্প',
        age: '৬-১০ বছর',
        description: 'বুদ্ধিমত্তা, সাহস ও আল্লাহর প্রতি বিশ্বাসের এক অনন্য গল্প।',
        cover: 'from-amber-950 via-yellow-900 to-amber-700',
        icon: '📖',
        premium: true,
    },
    {
        id: 3,
        title: 'হযরত ইউসুফ (আ.)-এর কাহিনি',
        category: 'নবীদের গল্প',
        age: '৮-১২ বছর',
        description: 'সবর, ক্ষমা ও উত্তম চরিত্রের শিক্ষায় সমৃদ্ধ কুরআনিক কাহিনি।',
        cover: 'from-teal-950 via-teal-800 to-emerald-700',
        icon: '✨',
        premium: false,
    },
    {
        id: 4,
        title: 'সৎ রাখালের গল্প',
        category: 'নৈতিক শিক্ষার গল্প',
        age: '৪-৮ বছর',
        description: 'সততা ও আমানতদারিতার সুন্দর শিক্ষা নিয়ে একটি গল্প।',
        cover: 'from-orange-950 via-amber-800 to-orange-700',
        icon: '🐑',
        premium: false,
    },
]

const categories = [
    {
        title: 'নবীদের গল্প',
        subtitle: 'Stories of the Prophets',
        icon: '🕌',
    },
    {
        title: 'সাহাবীদের গল্প',
        subtitle: 'Stories of the Sahaba',
        icon: '🌟',
    },
    {
        title: 'নেককারদের গল্প',
        subtitle: 'Stories of the Righteous',
        icon: '📚',
    },
    {
        title: 'নৈতিক শিক্ষার গল্প',
        subtitle: 'Moral Stories',
        icon: '🌿',
    },
]

const ageGroups = [
    {
        title: '৩-৫ বছর',
        subtitle: 'ছোটদের গল্প',
        description: 'সহজ ও আনন্দদায়ক গল্প',
    },
    {
        title: '৬-৮ বছর',
        subtitle: 'প্রাথমিক পাঠক',
        description: 'শিক্ষণীয় ছোট গল্প',
    },
    {
        title: '৯-১২ বছর',
        subtitle: 'কিশোর পাঠক',
        description: 'বিস্তারিত ইসলামিক কাহিনি',
    },
]

const popularStories: Story[] = [
    {
        id: 5,
        title: 'আসহাবে কাহাফ',
        category: 'কুরআনের গল্প',
        age: '৯-১২ বছর',
        description: 'ঈমান ও আল্লাহর রহমতের এক বিস্ময়কর কাহিনি।',
        cover: 'from-indigo-950 via-blue-900 to-indigo-700',
        icon: '🌌',
        premium: false,
    },
    {
        id: 6,
        title: 'হযরত ইবরাহিম (আ.)',
        category: 'নবীদের গল্প',
        age: '৬-১২ বছর',
        description: 'তাওহিদ ও আল্লাহর প্রতি আনুগত্যের গল্প।',
        cover: 'from-rose-950 via-red-900 to-amber-800',
        icon: '⭐',
        premium: true,
    },
    {
        id: 7,
        title: 'সত্যবাদী বালক',
        category: 'নৈতিক শিক্ষার গল্প',
        age: '৪-৮ বছর',
        description: 'সত্য কথা বলার সুন্দর শিক্ষা।',
        cover: 'from-cyan-950 via-teal-800 to-green-700',
        icon: '🌱',
        premium: false,
    },
    {
        id: 8,
        title: 'দয়ালু খলিফা',
        category: 'সাহাবীদের গল্প',
        age: '৮-১২ বছর',
        description: 'ন্যায়বিচার ও মানুষের প্রতি দয়ার গল্প।',
        cover: 'from-purple-950 via-violet-900 to-purple-700',
        icon: '🏰',
        premium: false,
    },
]

const searchUrl = () => {
    return `/search?q=${encodeURIComponent(searchQuery.value)}`
}
</script>

<template>
    <Head title="নেককারদের গল্প | Islamic Children's Storybook">
        <meta
            name="description"
            content="শিশুদের জন্য কুরআন, নবী-রাসূল ও নেককারদের শিক্ষণীয় ইসলামিক গল্পের অনলাইন লাইব্রেরি।"
        />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin="anonymous"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div
        class="min-h-screen overflow-hidden bg-[#0B1F16]
               font-['Hind_Siliguri'] text-emerald-50"
    >
        <!-- Navbar -->
        <Navbar />

        <!-- Hero Section -->
        <section
            class="relative overflow-hidden border-b
                   border-amber-400/10
                   bg-gradient-to-b from-[#102B20]
                   via-[#0B1F16] to-[#0B1F16]"
        >
            <!-- Decorative Background -->
            <div
                class="pointer-events-none absolute -right-32
                       -top-32 h-96 w-96 rounded-full
                       bg-emerald-500/10 blur-3xl"
            />

            <div
                class="pointer-events-none absolute -bottom-32
                       -left-32 h-96 w-96 rounded-full
                       bg-amber-400/5 blur-3xl"
            />

            <div
                class="relative mx-auto grid max-w-7xl
                       items-center gap-12 px-5 py-16
                       sm:px-8 sm:py-20 lg:grid-cols-2
                       lg:px-12 lg:py-24"
            >
                <!-- Hero Content -->
                <div class="text-center lg:text-left">
                    <div
                        class="mb-6 inline-flex items-center gap-2
                               rounded-full border
                               border-amber-400/20
                               bg-amber-400/5 px-4 py-2
                               text-sm text-amber-300"
                    >
                        <span>☪</span>
                        <span>শিশুদের ইসলামিক গল্পের জগৎ</span>
                    </div>

                    <h1
                        class="mb-6 text-4xl font-bold
                               leading-tight text-amber-300
                               sm:text-5xl lg:text-6xl"
                    >
                        নেককারদের গল্প

                        <span
                            class="mt-3 block text-2xl
                                   font-medium text-emerald-100
                                   sm:text-3xl"
                        >
                            Stories of the Righteous
                        </span>
                    </h1>

                    <p
                        class="mx-auto mb-8 max-w-xl
                               text-base leading-8
                               text-emerald-100/70
                               sm:text-lg lg:mx-0"
                    >
                        ছোট্ট সোনামণিদের জন্য কুরআন, নবী-রাসূল,
                        সাহাবী ও নেককারদের হৃদয়স্পর্শী গল্প।
                        গল্পের মাধ্যমে শিখুক ঈমান, আদব ও সুন্দর
                        চরিত্র গঠনের শিক্ষা।
                    </p>

                    <!-- Search Bar -->
                    <form
                        class="mx-auto flex max-w-xl
                               items-center gap-2 rounded-2xl
                               border border-amber-400/20
                               bg-[#183D2D] p-2
                               shadow-xl shadow-black/20
                               lg:mx-0"
                         @submit.prevent="router.visit(searchUrl())"
                    >
                        <span class="pl-3 text-xl">🔍</span>

                        <input
                            v-model="searchQuery"
                            type="search"
                            placeholder="আপনার পছন্দের গল্প খুঁজুন..."
                            class="min-w-0 flex-1 border-0
                                   bg-transparent px-2 py-3
                                   text-sm text-white
                                   outline-none
                                   placeholder:text-emerald-100/40
                                   focus:ring-0 sm:text-base"
                        />

                        <button
                            type="submit"
                            class="rounded-xl bg-amber-400
                                   px-5 py-3 text-sm
                                   font-bold text-[#102B20]
                                   transition hover:bg-amber-300"
                        >
                            খুঁজুন
                        </button>
                    </form>

                    <!-- Hero Buttons -->
                    <div
                        class="mt-8 flex flex-wrap
                               justify-center gap-4
                               lg:justify-start"
                    >
                        <Link
                            href="/stories"
                            class="rounded-xl bg-amber-400
                                   px-6 py-3 font-bold
                                   text-[#102B20]
                                   transition hover:bg-amber-300"
                        >
                            গল্প পড়া শুরু করুন →
                        </Link>

                        <Link
                            href="/categories"
                            class="rounded-xl border
                                   border-amber-400/30
                                   px-6 py-3 font-semibold
                                   text-amber-300
                                   transition hover:bg-amber-400/10"
                        >
                            গল্পের বিভাগ
                        </Link>
                    </div>

                    <!-- Stats -->
                    <div
                        class="mt-10 flex flex-wrap
                               justify-center gap-8
                               lg:justify-start"
                    >
                        <div>
                            <p class="text-2xl font-bold text-amber-300">
                                ১০০+
                            </p>
                            <p class="text-sm text-emerald-100/60">
                                শিক্ষণীয় গল্প
                            </p>
                        </div>

                        <div>
                            <p class="text-2xl font-bold text-amber-300">
                                ৪+
                            </p>
                            <p class="text-sm text-emerald-100/60">
                                গল্পের বিভাগ
                            </p>
                        </div>

                        <div>
                            <p class="text-2xl font-bold text-amber-300">
                                ৩-১২
                            </p>
                            <p class="text-sm text-emerald-100/60">
                                বয়সসীমা
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Hero Book Illustration -->
                <div
                    class="relative mx-auto flex w-full
                           max-w-md items-center
                           justify-center"
                >
                    <div
                        class="absolute h-72 w-72
                               rounded-full border
                               border-amber-400/10
                               bg-emerald-500/5
                               sm:h-96 sm:w-96"
                    />

                    <div
                        class="relative w-64 rotate-[-5deg]
                               rounded-r-2xl
                               border-l-8 border-amber-600
                               bg-gradient-to-br
                               from-[#1C4B35] via-[#123323]
                               to-[#081B11]
                               p-6 shadow-2xl
                               shadow-black/50
                               sm:w-72"
                    >
                        <div
                            class="rounded-xl border
                                   border-amber-400/40
                                   p-5 text-center"
                        >
                            <div class="mb-5 text-4xl">
                                ☪
                            </div>

                            <div
                                class="mb-3 text-xs
                                       tracking-[0.3em]
                                       text-amber-400"
                            >
                                ISLAMIC STORYBOOK
                            </div>

                            <h2
                                class="text-2xl font-bold
                                       leading-relaxed
                                       text-amber-300"
                            >
                                নেককারদের
                                <br />
                                গল্প
                            </h2>

                            <div
                                class="my-5 border-t
                                       border-amber-400/30"
                            />

                            <p
                                class="text-sm
                                       leading-7
                                       text-emerald-100/80"
                            >
                                শিশুদের জন্য
                                <br />
                                ঈমান ও নৈতিকতার গল্প
                            </p>

                            <div class="mt-6 text-3xl">
                                📖
                            </div>
                        </div>

                        <div
                            class="mt-4 text-center
                                   text-xs tracking-widest
                                   text-amber-400/70"
                        >
                            STORIES OF THE RIGHTEOUS
                        </div>
                    </div>

                    <!-- Floating Decoration -->
                    <div
                        class="absolute -right-2 top-10
                               rounded-xl border
                               border-amber-400/20
                               bg-[#183D2D] p-4
                               shadow-xl sm:-right-8"
                    >
                        <span class="text-2xl">🌙</span>
                    </div>

                    <div
                        class="absolute -bottom-2 left-0
                               rounded-xl border
                               border-amber-400/20
                               bg-[#183D2D] p-4
                               shadow-xl sm:-left-8"
                    >
                        <span class="text-2xl">✨</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Stories -->
        <section class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-12">
            <div
                class="mb-10 flex flex-wrap
                       items-end justify-between gap-4"
            >
                <div>
                    <p
                        class="mb-2 text-sm font-semibold
                               tracking-widest text-amber-400"
                    >
                        FEATURED COLLECTION
                    </p>

                    <h2
                        class="text-3xl font-bold
                               text-amber-300 sm:text-4xl"
                    >
                        নির্বাচিত গল্প
                    </h2>

                    <p class="mt-3 text-emerald-100/60">
                        ছোটদের জন্য আমাদের বিশেষ গল্পের সংগ্রহ
                    </p>
                </div>

                <Link
                    href="/stories"
                    class="text-sm font-semibold
                           text-amber-300
                           transition hover:text-amber-200"
                >
                    সব গল্প দেখুন →
                </Link>
            </div>

            <div
                class="grid grid-cols-1 gap-6
                       sm:grid-cols-2
                       lg:grid-cols-4"
            >
                <article
                    v-for="story in featuredStories"
                    :key="story.id"
                    class="group overflow-hidden
                           rounded-2xl border
                           border-amber-400/10
                           bg-[#102B20]
                           transition duration-300
                           hover:-translate-y-1
                           hover:border-amber-400/30
                           hover:shadow-xl
                           hover:shadow-black/20"
                >
                    <!-- Book Cover -->
                    <div
                        class="relative flex h-64
                               items-center justify-center
                               bg-gradient-to-br"
                        :class="story.cover"
                    >
                        <div
                            class="absolute inset-3
                                   rounded-xl border
                                   border-amber-400/30"
                        />

                        <div class="text-center">
                            <span class="text-6xl">
                                {{ story.icon }}
                            </span>

                            <h3
                                class="mt-5 px-5
                                       text-xl font-bold
                                       leading-relaxed
                                       text-amber-200"
                            >
                                {{ story.title }}
                            </h3>

                            <p
                                class="mt-3 text-xs
                                       tracking-widest
                                       text-amber-300/70"
                            >
                                ISLAMIC STORYBOOK
                            </p>
                        </div>

                        <span
                            v-if="story.premium"
                            class="absolute right-5
                                   top-5 rounded-full
                                   bg-amber-400 px-3 py-1
                                   text-xs font-bold
                                   text-[#102B20]"
                        >
                            PREMIUM
                        </span>
                    </div>

                    <!-- Card Content -->
                    <div class="p-5">
                        <div
                            class="mb-3 flex items-center
                                   justify-between gap-2"
                        >
                            <span
                                class="text-xs
                                       text-amber-400"
                            >
                                {{ story.category }}
                            </span>

                            <span
                                class="rounded-full
                                       bg-emerald-500/10
                                       px-3 py-1 text-xs
                                       text-emerald-200"
                            >
                                {{ story.age }}
                            </span>
                        </div>

                        <p
                            class="mb-5 text-sm
                                   leading-6
                                   text-emerald-100/60"
                        >
                            {{ story.description }}
                        </p>

                        <Link
                            :href="`/stories/${story.id}`"
                            class="block rounded-lg
                                   border border-amber-400/20
                                   py-2.5 text-center
                                   text-sm font-semibold
                                   text-amber-300
                                   transition
                                   hover:bg-amber-400/10"
                        >
                            গল্পটি পড়ুন →
                        </Link>
                    </div>
                </article>
            </div>
        </section>

        <!-- Categories -->
        <section
            class="border-y border-amber-400/10
                   bg-[#102B20]/60"
        >
            <div
                class="mx-auto max-w-7xl
                       px-5 py-16 sm:px-8 lg:px-12"
            >
                <div class="mb-10 text-center">
                    <p
                        class="mb-2 text-sm font-semibold
                               tracking-widest
                               text-amber-400"
                    >
                        EXPLORE BY CATEGORY
                    </p>

                    <h2
                        class="text-3xl font-bold
                               text-amber-300 sm:text-4xl"
                    >
                        গল্পের বিভাগ
                    </h2>

                    <p
                        class="mt-3 text-emerald-100/60"
                    >
                        আপনার পছন্দের বিষয় থেকে গল্প বেছে নিন
                    </p>
                </div>

                <div
                    class="grid grid-cols-1 gap-5
                           sm:grid-cols-2
                           lg:grid-cols-4"
                >
                    <Link
                        v-for="category in categories"
                        :key="category.title"
                        href="/categories"
                        class="group rounded-2xl
                               border border-amber-400/10
                               bg-[#0B1F16] p-6
                               text-center
                               transition duration-300
                               hover:-translate-y-1
                               hover:border-amber-400/30
                               hover:bg-[#183D2D]"
                    >
                        <div
                            class="mx-auto mb-4
                                   flex h-16 w-16
                                   items-center justify-center
                                   rounded-2xl border
                                   border-amber-400/20
                                   bg-emerald-500/5
                                   text-3xl
                                   transition
                                   group-hover:bg-amber-400/10"
                        >
                            {{ category.icon }}
                        </div>

                        <h3
                            class="mb-2 text-lg font-bold
                                   text-amber-300"
                        >
                            {{ category.title }}
                        </h3>

                        <p
                            class="text-xs
                                   text-emerald-100/50"
                        >
                            {{ category.subtitle }}
                        </p>
                    </Link>
                </div>
            </div>
        </section>

        <!-- Age Wise Stories -->
        <section class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-12">
            <div class="mb-10 text-center">
                <p
                    class="mb-2 text-sm font-semibold
                           tracking-widest text-amber-400"
                >
                    STORIES FOR EVERY AGE
                </p>

                <h2
                    class="text-3xl font-bold
                           text-amber-300 sm:text-4xl"
                >
                    বয়সভিত্তিক গল্প
                </h2>

                <p class="mt-3 text-emerald-100/60">
                    শিশুর বয়স অনুযায়ী উপযুক্ত গল্প নির্বাচন করুন
                </p>
            </div>

            <div
                class="grid grid-cols-1 gap-6
                       md:grid-cols-3"
            >
                <Link
                    v-for="group in ageGroups"
                    :key="group.title"
                    href="/age"
                    class="group relative overflow-hidden
                           rounded-2xl border
                           border-amber-400/15
                           bg-gradient-to-br
                           from-[#183D2D] to-[#102B20]
                           p-8 text-center
                           transition duration-300
                           hover:border-amber-400/40
                           hover:shadow-xl
                           hover:shadow-black/20"
                >
                    <div
                        class="absolute -right-8
                               -top-8 h-32 w-32
                               rounded-full
                               bg-amber-400/5
                               transition
                               group-hover:bg-amber-400/10"
                    />

                    <div
                        class="relative mb-4
                               text-4xl font-bold
                               text-amber-300"
                    >
                        {{ group.title }}
                    </div>

                    <h3
                        class="relative mb-3
                               text-xl font-bold
                               text-emerald-50"
                    >
                        {{ group.subtitle }}
                    </h3>

                    <p
                        class="relative mb-6
                               text-sm
                               text-emerald-100/60"
                    >
                        {{ group.description }}
                    </p>

                    <span
                        class="relative inline-block
                               rounded-lg
                               border border-amber-400/20
                               px-5 py-2
                               text-sm font-semibold
                               text-amber-300
                               transition
                               group-hover:bg-amber-400/10"
                    >
                        গল্প দেখুন →
                    </span>
                </Link>
            </div>
        </section>

        <!-- Popular Stories -->
        <section
            class="border-t border-amber-400/10
                   bg-[#102B20]/60"
        >
            <div
                class="mx-auto max-w-7xl
                       px-5 py-16 sm:px-8 lg:px-12"
            >
                <div
                    class="mb-10 flex flex-wrap
                           items-end justify-between gap-4"
                >
                    <div>
                        <p
                            class="mb-2 text-sm
                                   font-semibold
                                   tracking-widest
                                   text-amber-400"
                        >
                            POPULAR BOOKSHELF
                        </p>

                        <h2
                            class="text-3xl font-bold
                                   text-amber-300 sm:text-4xl"
                        >
                            জনপ্রিয় গল্প
                        </h2>

                        <p
                            class="mt-3 text-emerald-100/60"
                        >
                            পাঠকদের পছন্দের ইসলামিক গল্প
                        </p>
                    </div>

                    <Link
                        href="/stories"
                        class="text-sm font-semibold
                               text-amber-300
                               hover:text-amber-200"
                    >
                        লাইব্রেরি দেখুন →
                    </Link>
                </div>

                <!-- Bookshelf -->
                <div
                    class="grid grid-cols-2 gap-4
                           sm:grid-cols-2
                           lg:grid-cols-4"
                >
                    <article
                        v-for="story in popularStories"
                        :key="story.id"
                        class="group"
                    >
                        <Link
                            :href="`/stories/${story.id}`"
                            class="block"
                        >
                            <div
                                class="relative flex
                                       aspect-[3/4]
                                       items-center
                                       justify-center
                                       overflow-hidden
                                       rounded-r-xl
                                       border-l-4
                                       border-amber-600
                                       bg-gradient-to-br
                                       shadow-xl
                                       shadow-black/20
                                       transition duration-300
                                       group-hover:-translate-y-2
                                       group-hover:shadow-amber-400/10"
                                :class="story.cover"
                            >
                                <div
                                    class="absolute inset-3
                                           rounded-lg border
                                           border-amber-400/25"
                                />

                                <div class="relative text-center">
                                    <span class="text-5xl sm:text-6xl">
                                        {{ story.icon }}
                                    </span>

                                    <h3
                                        class="mt-4 px-3
                                               text-base
                                               font-bold
                                               leading-relaxed
                                               text-amber-200
                                               sm:text-xl"
                                    >
                                        {{ story.title }}
                                    </h3>

                                    <p
                                        class="mt-3 text-[10px]
                                               tracking-widest
                                               text-amber-300/60"
                                    >
                                        STORYBOOK
                                    </p>
                                </div>

                                <span
                                    v-if="story.premium"
                                    class="absolute
                                           right-4 top-4
                                           rounded-full
                                           bg-amber-400
                                           px-2 py-1
                                           text-[10px]
                                           font-bold
                                           text-[#102B20]"
                                >
                                    PREMIUM
                                </span>
                            </div>
                        </Link>

                        <div class="mt-4">
                            <h3
                                class="text-sm font-semibold
                                       text-emerald-50
                                       sm:text-base"
                            >
                                {{ story.title }}
                            </h3>

                            <p
                                class="mt-1 text-xs
                                       text-emerald-100/50"
                            >
                                {{ story.category }}
                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-12">
            <div
                class="relative overflow-hidden
                       rounded-3xl border
                       border-amber-400/20
                       bg-gradient-to-r
                       from-[#183D2D] to-[#102B20]
                       px-6 py-12 text-center
                       sm:px-12"
            >
                <div
                    class="absolute inset-0
                           bg-amber-400/[0.02]"
                />

                <div class="relative">
                    <div class="mb-5 text-4xl">
                        🌙
                    </div>

                    <h2
                        class="mb-5 text-2xl
                               font-bold
                               text-amber-300
                               sm:text-4xl"
                    >
                        গল্পের মাধ্যমে গড়ে উঠুক
                        <br />
                        সুন্দর আগামী
                    </h2>

                    <p
                        class="mx-auto mb-8
                               max-w-2xl
                               leading-8
                               text-emerald-100/70"
                    >
                        আপনার শিশুকে উপহার দিন ঈমান, আদব,
                        সততা ও নৈতিক শিক্ষায় সমৃদ্ধ
                        ইসলামিক গল্পের এক সুন্দর জগৎ।
                    </p>

                    <Link
                        href="/stories"
                        class="inline-block
                               rounded-xl
                               bg-amber-400
                               px-8 py-4
                               font-bold
                               text-[#102B20]
                               shadow-lg
                               transition
                               hover:bg-amber-300"
                    >
                        গল্পের লাইব্রেরিতে প্রবেশ করুন →
                    </Link>
                </div>
            </div>
        </section>

        <!-- Temporary Footer -->
        <footer
            class="border-t border-amber-400/10
                   bg-[#081810] px-5 py-8
                   text-center"
        >
            <p class="text-sm text-emerald-100/50">
                © {{ new Date().getFullYear() }}
                IslamicStoryBook.
                সকল স্বত্ব সংরক্ষিত।
            </p>

            <p class="mt-2 text-xs text-amber-400/60">
                Stories of the Righteous
            </p>
        </footer>
    </div>
</template>
