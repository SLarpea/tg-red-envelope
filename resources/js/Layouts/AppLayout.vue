<template>
    <HeaderLayout />
    <SidebarLayout />
    <div class="pseudo-back"></div>
    <main id="main" class="main">
        <slot />
    </main>
</template>

<script>
import HeaderLayout from "./HeaderLayout.vue";
import SidebarLayout from "./SidebarLayout.vue";

export default {
    components: {
        HeaderLayout,
        SidebarLayout,
    },
};
</script>
