<template>
    <div class="row">
        <div class="col-lg-6">
            <p class="show-entries" v-show="data.total > 0">
                {{ $t('showing') }} {{ data.from }} {{ $t('to') }} {{ data.to }} {{ $t('of') }} {{ data.total }} {{
                    $t('items') }}
            </p>
        </div>
        <div class="col-lg-6">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm justify-content-end">
                    <template v-for="(link, k) in data.links" :key="k">
                        <li v-if="link.url === null" class="page-item">
                            <a class="page-link">
                                <i class="bi bi-chevron-double-left" v-if="link.label.includes('Previous')"></i>
                                <i class="bi bi-chevron-double-right" v-else-if="link.label.includes('Next')"></i>
                            </a>
                        </li>
                        <li v-else class="page-item" :class="{ active: link.active }">
                            <Link :href="generateLinkPerPage(link.url)" class="page-link">
                            <i class="bi bi-chevron-double-left" v-if="link.label.includes('Previous')"></i>
                            <i class="bi bi-chevron-double-right" v-else-if="link.label.includes('Next')"></i>
                            <span v-else v-html="link.label"></span>
                            </Link>
                        </li>
                    </template>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/vue3";

export default defineComponent({
    props: {
        data: Object,
    },
    components: {
        Link,
    },
    methods: {
        generateLinkPerPage(originalUrl) {
            let url = originalUrl;

            // Remove existing 'plf' parameter
            const urlObj = new URL(url);
            const params = new URLSearchParams(urlObj.search);
            params.delete('plf');

            // Append 'plf' parameter if it exists in the data
            if (this.data.plf !== undefined && this.data.plf !== '') {
                params.append('plf', this.data.plf);
            }

            // Create a new URL with the updated parameters
            const newUrl = new URL(urlObj.origin + urlObj.pathname + '?' + params.toString());

            return this.removeDuplicateQueryParameters(newUrl.toString());
        },
        removeDuplicateQueryParameters(url) {
            const urlObj = new URL(url);
            const params = new URLSearchParams(urlObj.search);

            // Create an object to store unique query parameters
            const uniqueParams = {};

            // Iterate through the existing parameters
            for (const [key, value] of params.entries()) {
                // Store the first occurrence of each parameter
                if (!uniqueParams.hasOwnProperty(key)) {
                    uniqueParams[key] = value;
                }
            }

            // Create a new URL with the unique parameters
            const newUrl = new URL(urlObj.origin + urlObj.pathname);
            for (const [key, value] of Object.entries(uniqueParams)) {
                newUrl.searchParams.append(key, value);
            }

            return newUrl.toString();
        }

    }
});
</script>
