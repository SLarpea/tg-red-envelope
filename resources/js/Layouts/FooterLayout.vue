<template>
    <div class="footer">
        <div class="text-center">
            {{ $t('all_rights_reserved') }} {{ year }}
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
