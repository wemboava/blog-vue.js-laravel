<template>
    <div :class="selectedColor">
        <div class="panel-heading">{{title}}</div>

        <div class="panel-body">
            <slot></slot>
        </div>
    </div>

</template>

<script>
    export default {
        props: ['title', 'color'],
        computed: {
            selectedColor () {
                return `panel ${this.color} || panel-default`
            }
        }
    }
</script>

<style lang="scss" scoped>
    .blue {
        border-color: #0d4a96;
    }
    .blue > .panel-heading {
        color: #f7f7f7;
        background-color: #0d4a96;
        border-color: #0d4a96;
    }
</style>
