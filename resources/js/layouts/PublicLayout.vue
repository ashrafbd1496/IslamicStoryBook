
<script setup lang="ts">
import Navbar from '@/components/Shared/Navbar.vue'

defineProps<{
    title?: string
}>()
</script>

<template>
    <div
        class="min-h-screen bg-[#0B1F16]
               text-emerald-50"
    >
        <Navbar />

        <main>
            <slot />
        </main>
    </div>
</template>
