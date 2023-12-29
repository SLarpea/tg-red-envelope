<template>
    <div class="footer">
        <div class="text-center">
            版权所有 {{ year }}
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            year: new Date().getFullYear(),
        };
    },
}

</script>
