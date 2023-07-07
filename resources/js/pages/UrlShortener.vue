<script setup>

import CreateUrlShortener from '@/components/UrlShortener/Create.vue';
import GeneratedLinkUrlShortener from '@/components/UrlShortener/GeneratedLink.vue';
import { ref } from 'vue';

const shortenedUrl = ref('');

const generatedShortenedUrl = (url) => {
    shortenedUrl.value = url
}

</script>
<template>
    <div class="w-[40rem] shadow p-10 rounded-lg flex flex-col items-center justify-center">
        <h1 class="font-bold text-3xl text-center text-blue-800"><i class="fas fa-link"></i> Url Shortener</h1>
        <CreateUrlShortener @on-generated-shortened-url="generatedShortenedUrl($event)" />
        <GeneratedLinkUrlShortener :generatedShortenedUrl="shortenedUrl" />
    </div>
</template>