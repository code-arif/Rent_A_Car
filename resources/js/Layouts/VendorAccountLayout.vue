<script setup>

</script>

<template>
    <!-- Hero Section (Top) -->
    <section class="hero-section">
        <div class="overlay d-flex flex-column align-items-center justify-content-center text-white">
            <h1 class="fw-bold">Welcome to Mini Shop</h1>
            <p class="lead">Join us and start your journey as a seller today!</p>
        </div>
    </section>

    <slot>

    </slot>
</template>

<style scoped>
.hero-section {
    background: url('https://img.freepik.com/free-vector/tropical-summer-background-with-parasol_53876-173493.jpg?t=st=1739252839~exp=1739256439~hmac=e0c5addd3e360be8db9d47c2f1eeeb3a70ee239faa7e0af1113bc9b8582eb862&w=826') no-repeat center center/cover;
    height: 300px;
    position: relative;
}

.bottor-hero-section {
    background: url('https://img.freepik.com/free-photo/white-table-lamp-green-background-copy-space_169016-52263.jpg?t=st=1739252714~exp=1739256314~hmac=63eda7305f08e1a29be695ec97441324656b13baa593623bb04dc27f446decd5&w=826') no-repeat center center/cover;
    height: 300px;
    position: relative;
}

.overlay {
    background: rgba(0, 0, 0, 0.5);
    height: 100%;
    width: 100%;
    text-align: center;
}

.line {
    background: #0dcaf0;
    height: 1.5px;
    width: 40%;
    margin: 10px 0;
}
</style>
