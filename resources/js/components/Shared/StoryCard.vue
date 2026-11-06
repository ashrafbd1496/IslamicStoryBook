
<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

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

defineProps<{
    story: Story
}>()
</script>

<template>
    <article
        class="group overflow-hidden rounded-2xl
               border border-amber-400/10
               bg-[#102B20]
               transition duration-300
               hover:-translate-y-1
               hover:border-amber-400/30
               hover:shadow-xl hover:shadow-black/20"
    >
        <!-- Book Cover -->
        <div
            class="relative flex h-64 items-center
                   justify-center overflow-hidden
                   bg-gradient-to-br"
            :class="story.cover"
        >
            <div
                class="absolute inset-3 rounded-xl
                       border border-amber-400/30"
            />

            <div class="relative px-5 text-center">
                <span class="text-6xl">
                    {{ story.icon }}
                </span>

                <h3
                    class="mt-5 text-xl font-bold
                           leading-relaxed text-amber-200"
                >
                    {{ story.title }}
                </h3>

                <p
                    class="mt-3 text-xs tracking-widest
                           text-amber-300/70"
                >
                    ISLAMIC STORYBOOK
                </p>
            </div>

            <!-- Premium Badge -->
            <span
                v-if="story.premium"
                class="absolute right-4 top-4
                       rounded-full bg-amber-400
                       px-3 py-1 text-xs font-bold
                       text-[#102B20]"
            >
                PREMIUM
            </span>
        </div>

        <!-- Story Information -->
        <div class="p-5">
            <div
                class="mb-3 flex flex-wrap
                       items-center justify-between gap-2"
            >
                <span class="text-xs text-amber-400">
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

            <h4
                class="mb-2 text-lg font-bold
                       text-emerald-50"
            >
                {{ story.title }}
            </h4>

            <p
                class="mb-5 min-h-12 text-sm
                       leading-6 text-emerald-100/60"
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
</template>
