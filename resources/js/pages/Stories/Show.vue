
<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'

import Navbar from '@/components/Shared/Navbar.vue'

interface Story {
    id: number
    title: string
    category: string
    age: string
    icon: string
    premium: boolean
    description: string
    content: string[]
}

defineProps<{
    story: Story
}>()
</script>

<template>
    <Head :title="`${story.title} | IslamicStoryBook`" />

    <div
        class="min-h-screen bg-[#0B1F16]
               font-['Hind_Siliguri']
               text-emerald-50"
    >
        <Navbar />

        <!-- Breadcrumb -->
        <div
            class="mx-auto max-w-7xl
                   px-5 pt-8 sm:px-8 lg:px-12"
        >
            <nav
                class="flex flex-wrap items-center gap-2
                       text-sm text-emerald-100/50"
            >
                <Link
                    href="/"
                    class="transition hover:text-amber-300"
                >
                    হোম
                </Link>

                <span>/</span>

                <Link
                    href="/stories"
                    class="transition hover:text-amber-300"
                >
                    গল্পের লাইব্রেরি
                </Link>

                <span>/</span>

                <span class="text-amber-300">
                    {{ story.title }}
                </span>
            </nav>
        </div>

        <!-- Story Details -->
        <main
            class="mx-auto max-w-7xl
                   px-5 py-10 sm:px-8 lg:px-12"
        >
            <div
                class="grid grid-cols-1 gap-10
                       lg:grid-cols-3"
            >
                <!-- Book Cover -->
                <aside class="lg:col-span-1">
                    <div
                        class="relative mx-auto flex
                               min-h-[420px] max-w-sm
                               items-center justify-center
                               overflow-hidden rounded-2xl
                               border border-amber-400/20
                               bg-gradient-to-br
                               from-emerald-950
                               via-green-800
                               to-emerald-700
                               shadow-2xl
                               shadow-black/30"
                    >
                        <div
                            class="absolute inset-4
                                   rounded-xl
                                   border border-amber-400/30"
                        />

                        <div
                            class="relative px-6
                                   text-center"
                        >
                            <div class="text-8xl">
                                {{ story.icon }}
                            </div>

                            <h1
                                class="mt-8 text-3xl
                                       font-bold
                                       leading-relaxed
                                       text-amber-300"
                            >
                                {{ story.title }}
                            </h1>

                            <p
                                class="mt-5 text-xs
                                       tracking-[0.3em]
                                       text-amber-300/70"
                            >
                                ISLAMIC STORYBOOK
                            </p>

                            <div
                                class="mx-auto mt-8
                                       h-px w-32
                                       bg-amber-400/30"
                            />

                            <p
                                class="mt-5 text-sm
                                       text-emerald-100/70"
                            >
                                Stories of the Righteous
                            </p>
                        </div>

                        <span
                            v-if="story.premium"
                            class="absolute right-5 top-5
                                   rounded-full
                                   bg-amber-400
                                   px-4 py-1.5
                                   text-xs font-bold
                                   text-[#102B20]"
                        >
                            PREMIUM
                        </span>
                    </div>

                    <!-- Story Metadata -->
                    <div
                        class="mt-5 rounded-2xl
                               border border-amber-400/10
                               bg-[#102B20] p-5"
                    >
                        <div
                            class="flex items-center
                                   justify-between
                                   border-b
                                   border-amber-400/10
                                   pb-4"
                        >
                            <span
                                class="text-sm
                                       text-emerald-100/60"
                            >
                                গল্পের বিভাগ
                            </span>

                            <span
                                class="font-semibold
                                       text-amber-300"
                            >
                                {{ story.category }}
                            </span>
                        </div>

                        <div
                            class="mt-4 flex items-center
                                   justify-between"
                        >
                            <span
                                class="text-sm
                                       text-emerald-100/60"
                            >
                                বয়স
                            </span>

                            <span
                                class="rounded-full
                                       bg-emerald-500/10
                                       px-3 py-1
                                       text-sm
                                       text-emerald-200"
                            >
                                {{ story.age }}
                            </span>
                        </div>
                    </div>
                </aside>

                <!-- Story Information -->
                <section class="lg:col-span-2">
                    <div
                        class="rounded-2xl
                               border border-amber-400/10
                               bg-[#102B20] p-6
                               sm:p-10"
                    >
                        <p
                            class="mb-3 text-sm
                                   font-semibold
                                   tracking-widest
                                   text-amber-400"
                        >
                            {{ story.category }}
                        </p>

                        <h2
                            class="mb-6 text-3xl
                                   font-bold
                                   leading-relaxed
                                   text-amber-300
                                   sm:text-4xl"
                        >
                            {{ story.title }}
                        </h2>

                        <!-- Description -->
                        <div
                            class="mb-8 rounded-xl
                                   border-l-4
                                   border-amber-400
                                   bg-emerald-950/40
                                   p-5"
                        >
                            <h3
                                class="mb-2 font-bold
                                       text-amber-200"
                            >
                                গল্পের পরিচিতি
                            </h3>

                            <p
                                class="leading-8
                                       text-emerald-100/70"
                            >
                                {{ story.description }}
                            </p>
                        </div>

                        <!-- Story Content -->
                        <div>
                            <h3
                                class="mb-6 text-2xl
                                       font-bold
                                       text-amber-300"
                            >
                                📖 গল্পটি পড়ুন
                            </h3>

                            <div class="space-y-5
                                    text-base
                                    leading-10
                                    text-emerald-50/90
                                    sm:text-lg"
                            >
                                <p
                                    v-for="(paragraph, index) in story.content"
                                    :key="index"
                                >
                                    {{ paragraph }}
                                </p>
                            </div>
                        </div>

                        <!-- Back Button -->
                        <div
                            class="mt-8 flex flex-wrap
           items-center gap-4 border-t border-amber-400/10 pt-6"
                        >
                            <Link
                                href="/stories"
                                class="inline-flex
                                       items-center
                                       gap-2 rounded-xl
                                       bg-amber-400
                                       px-6 py-3
                                       font-bold
                                       text-[#102B20]
                                       transition
                                       hover:bg-amber-300"
                            >
                                ← গল্পের লাইব্রেরিতে ফিরে যান
                            </Link>

                            <Link
                                :href="`/stories/${story.id}/read`"
                                class="inline-flex items-center gap-2
                                    rounded-xl bg-amber-400
                                    px-6 py-3 font-bold
                                    text-[#102B20]
                                    transition hover:bg-amber-300"
                            >
                                📖 সম্পূর্ণ গল্প পড়ুন →
                            </Link>
                        </div>
                    </div>
                </section>
            </div>
        </main>

        <!-- Footer -->
        <footer
            class="border-t
                   border-amber-400/10
                   bg-[#081810]
                   px-5 py-8
                   text-center"
        >
            <p
                class="text-sm
                       text-emerald-100/50"
            >
                © {{ new Date().getFullYear() }}
                IslamicStoryBook.
                সকল স্বত্ব সংরক্ষিত।
            </p>

            <p
                class="mt-2 text-xs
                       text-amber-400/60"
            >
                Stories of the Righteous
            </p>
        </footer>
    </div>
</template>
