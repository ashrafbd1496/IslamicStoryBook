
<script setup lang="ts">
import StoryCard from '@/components/Shared/StoryCard.vue'

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
    stories: Story[]
}>()
</script>

<template>
    <div
        v-if="stories.length"
        class="grid grid-cols-1 gap-6
               sm:grid-cols-2
               lg:grid-cols-3
               xl:grid-cols-4"
    >
        <StoryCard
            v-for="story in stories"
            :key="story.id"
            :story="story"
        />
    </div>

    <!-- Empty State -->
    <div
        v-else
        class="rounded-2xl border
               border-amber-400/10
               bg-[#102B20] px-6 py-16
               text-center"
    >
        <div class="mb-4 text-5xl">
            📚
        </div>

        <h3
            class="mb-2 text-xl font-bold
                   text-amber-300"
        >
            কোনো গল্প পাওয়া যায়নি
        </h3>

        <p class="text-sm text-emerald-100/60">
            অন্য কোনো নাম অথবা Category দিয়ে খুঁজে দেখুন।
        </p>
    </div>
</template>
