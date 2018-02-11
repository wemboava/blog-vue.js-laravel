<template>
    <span>
        <span v-if="item">
            <button @click="fillForm()" v-if="!type || (type !== 'button' && type !== 'link')" type="button" :class="css || 'btn btn-primary'" data-toggle="modal" :data-target="'#' + nameModal">{{title}}</button>
            <button @click="fillForm()" v-if="type === 'button'" type="button" :class="css || 'btn btn-primary'" data-toggle="modal" :data-target="'#' + nameModal">{{title}}</button>
            <a @click="fillForm()" v-if="type === 'link'" :class="css || ''" href="" data-toggle="modal" :data-target="'#' + nameModal">{{title}} |</a>
        </span>
        <span v-if="!item">
            <button @click="fillForm()" v-if="!type || (type !== 'button' && type !== 'link')" type="button" :class="css || 'btn btn-primary'" data-toggle="modal" :data-target="'#' + nameModal">{{title}}</button>
            <button @click="fillForm()" v-if="type === 'button'" type="button" :class="css || 'btn btn-primary'" data-toggle="modal" :data-target="'#' + nameModal">{{title}}</button>
            <a @click="fillForm()" v-if="type === 'link'" :class="css || ''" href="" data-toggle="modal" :data-target="'#' + nameModal">{{title}} |</a>
        </span>
    </span>
</template>

<script>
    export default {
        props: ['type', 'nameModal', 'title', 'css', 'item'],
        
        methods: {
            fillForm () {
                this.$store.commit('setItem', this.item)
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
