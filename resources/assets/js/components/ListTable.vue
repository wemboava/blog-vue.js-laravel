<template>
    <div>
        <a v-if="create && !modal" :href="create">Create</a>
        <modal-link v-if="create && modal" type="button" name-modal="modalAdd" title="Criar" css=""></modal-link>
        <div class="form-inline">
            <a href=""></a>
            <div class="form-group pull-right">
                <input type="search" placeholder="search" v-model="filter" class="form-control">
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="title-table" @click="toggleOrdem(index)" v-for="(title, index) in titles" :key="index">{{title}}</th>
                    <th v-if="details || edit || deletes">Actions</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="(item, index) in list" :key="index">
                    <td  v-for="(i, index) in item" :key="index">{{i}}</td>
                    
                    <form :id="index" v-if="deletes && token" :action="deletes + item.id" method="POST">
                        
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" :value="token">
                        
                        <a v-if="details && !modal" :href="details">Details |</a>
                        <modal-link v-if="details && modal" type="link" :item="item" name-modal="modalDetails" title="Details" css="" :url="details"></modal-link>
                        
                        <a v-if="edit && !modal" :href="edit">Edit |</a>
                        <modal-link v-if="edit && modal" type="link" :item="item" name-modal="modalEdit" title="edit" css="" :url="edit"></modal-link>
                        
                        <a v-if="deletes" @click="initForm(index)">oi Delete</a>
                    </form>

                    <span v-if="!token">
                        <a v-if="details && !modal" :href="details">Details |</a>
                        <modal-link v-if="details && modal" type="link" :item="item" name-modal="modalDetails" title="Details" css="" :url="details"></modal-link>
                        
                        <a v-if="edit && !modal" :href="edit">Edit |</a>
                        <modal-link v-if="edit && modal" type="link" :item="item" name-modal="modalEdit" title="edit" css="" :url="edit"></modal-link>
                        
                        <a v-if="deletes" :href="deletes">Delete</a>
                    </span>

                    <span v-if="token && !deletes">
                        <a v-if="details && !modal" :href="details">Details |</a>
                        <modal-link v-if="details && modal" type="link" :item="item" name-modal="modalDetails" title="Details" css="" :url="details"></modal-link>
                        
                        <a v-if="edit && !modal" :href="edit">Edit |</a>
                        <modal-link v-if="edit && modal" type="link" :item="item" name-modal="modalEdit" title="edit" css="" :url="edit"></modal-link>
                    </span>
                </tr>
                
            </tbody>
        </table>

    </div>
</template>

<script>
    export default {
        props: ['titles', 'items', 'create', 'details', 'edit', 'deletes', 'token', 'modal'],
        
        data () {
            return {
                filter: '',
                ordem: 'decs',
                ordemCol: 0
            }
        },
        mounted () {
            
        },
        computed: {
            list () {
                const lista = this.items.data

                this.ordem = this.ordem.toLowerCase()
                this.ordemCol = parseInt(this.ordemCol)

                if (this.ordem === "asc") {
                    lista.sort((a, b) => {      
                        if (Object.values(a)[this.ordemCol] < Object.values(b)[this.ordemCol]) { return 1}
                        if (Object.values(a)[this.ordemCol] > Object.values(b)[this.ordemCol]) { return -1}
                        return 0
                    }) 
                } else {
                    lista.sort((a, b) => {
                        console.log('a =>', a);
                        console.log('a Obj =>', Object.values(a));
                        if (Object.values(a)[this.ordemCol] > Object.values(b)[this.ordemCol]) { return 1}
                        if (Object.values(a)[this.ordemCol] < Object.values(b)[this.ordemCol]) { return -1}
                        return 0
                    })
                }

                return lista.filter(res => {

                    if (res['title'].toLowerCase().indexOf(this.filter.toLowerCase()) >= 0
                        || res['description'].toLowerCase().indexOf(this.filter.toLowerCase()) >= 0) {
                        return true
                    }
                    return false
                })  

            }
        },
        methods: {
            initForm (index) {
                document.getElementById(index).submit();
            },
            toggleOrdem (index) {
                this.ordem = this.ordem === 'desc'
                    ? 'asc' : 'desc'
                this.ordemCol = index
            }
        }
    }

</script>

<style lang="scss" scoped>
    .title-table {
        cursor: pointer;
    }
</style>
