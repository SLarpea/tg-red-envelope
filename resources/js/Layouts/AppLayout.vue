<template>
    <HeaderLayout />
    <SidebarLayout />
    <div class="pseudo-back"></div>
    <main id="main" class="main">
        <slot />

        </main>
    <FooterLayout />
</template>

<script>
import HeaderLayout from './HeaderLayout.vue';
import SidebarLayout from './SidebarLayout.vue';
import FooterLayout from './FooterLayout.vue';

export default {
    components: {
        HeaderLayout, SidebarLayout, FooterLayout
    },
}

</script>
