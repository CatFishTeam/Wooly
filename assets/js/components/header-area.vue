<template>
    <header>
        <div class="header">
            <div class="logo">
                <img src="/images/cat.svg" alt="Logo Wooly">
            </div>
            <h1 class="sitetitle">Wooly</h1>
        </div>
    </header>
</template>

<script>
    export default {
    }
</script>

<style scoped>

    header {
        padding: 1.5% 12% 0;
    }

    .header {
        display: flex;
        align-items: center;
    }

    .logo img {
        width: 68px;
    }

    h1.sitetitle {
        font-size: 38px;
        color: #AAD77B;
        margin-left: 30px;
    }
</style>