<script setup>
import PublicLayout from "@/Layouts/PublicLayout.vue";
import HeroSection from "@/Pages/FrontPage/Partials/HeroSection.vue";
import MenuSection from "@/Pages/FrontPage/Partials/MenuSection.vue";
import FooterSection from "@/Pages/FrontPage/Partials/FooterSection.vue";
import {Head, usePage} from "@inertiajs/vue3";
const basicInfo = usePage().props.basicInfo;
</script>


<template>
    <Head>
        <meta v-if="basicInfo.meta_title" name="title" :content=basicInfo.meta_title>
        <meta v-if="basicInfo.meta_description" name="description" :content=basicInfo.meta_description>

        <meta v-if="basicInfo.meta_title" property="og:title" :content=basicInfo.meta_title />
        <meta v-if="basicInfo.meta_description" property="og:description" :content=basicInfo.meta_description />
        <meta v-if="basicInfo.meta_picture" property="og:image" :content=basicInfo.full_meta_picture_path />

    </Head>
    <PublicLayout>
        <HeroSection id="hero"></HeroSection>
        <MenuSection id="menu"></MenuSection>
        <FooterSection id="footer"></FooterSection>
    </PublicLayout>
</template>

