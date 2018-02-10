<template>
    <ol class="breadcrumb">
        <li 
            v-for="(item, index) in list" 
            :key="index" 
            :class="index === list.length ? 'activity' : ''"
        >
            <a v-if="item.url" :href="item.url">{{item.title}}</a>
            <span v-if="!item.url">{{item.title}}</span>
        </li>
    </ol>
</template>

<script>
    export default {
        mounted () {
    
        },
        props: ['list']
    }
</script>

<style lang="scss" scoped>

</style>
