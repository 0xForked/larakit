<template>
    <div class="card">
        <div class="card-header">Setting Component</div>
        <div class="card-body">
            <div class="alert alert-success" role="alert">
                {{test}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                test: 'test'
            }
        }
    }
</script>
