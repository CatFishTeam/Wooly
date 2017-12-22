<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" v-if="!test">
                        Example Component
                    </div>
                    <div class="panel-body" @click="testAlert">
                        I'm an example component!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                test: "Test"
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            testAlert: function(){
                alert(this.test)
            }
        }
    }
</script>
