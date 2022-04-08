<template>
    <h1>Hello, {{ name }}</h1>

    <p>Here are a few framworks</p>

    <ul>
        <li 
        v-for="framework of frameworks" 
        v-text="framework">
        </li>
    </ul>
</template>

<script>
export default {
    props: {
        name: String,
        frameworks: Array,
    }
    
}
</script>