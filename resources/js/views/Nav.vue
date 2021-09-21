<template>
    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex">
            <ul class="nav">
                <li v-for="(link, index) in links" :key="index">
                    <router-link class="p-2 link-secondary" :to="{name: link.routeName}">{{ link.label }}</router-link>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'Nav',
    props: {
        links: Array
    }
}
</script>

<style lang="scss" scoped>

</style>