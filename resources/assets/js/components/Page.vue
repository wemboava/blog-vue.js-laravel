<template>
    <div class="container">
        <div class="row">
            <div :class="defineSize">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['size'],

        computed: {
            defineSize () {
                if (this.size >= 12) {
                    return "col-md-12"
                }
                if (this.size <= 2) {
                    return "col-md-2 col-md-offset-5"
                }
                if ((this.size % 2) === 0) {
                    return "col-md-"+ this.size +" col-md-offset-"+ ((12 - this.size)/2);    
                }
                else {
                    return "col-md-"+ (this.size + 1) +" col-md-offset-"+ ((12 - parseInt(this.size) + 1)/2);    
                }
            }
        }
    }
</script>
