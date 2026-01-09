<template>
    <aside>
        <nav>
            <NuxtLink to="/">SHARE</NuxtLink>
            <ul>
                <li class="nav-home">
                    <NuxtLink to="/">
                    <img src="" alt="⌂">
                    <span>ホーム</span>
                    </NuxtLink>
                </li>
                <li class="nav-logout">
                    <NuxtLink to="/login">
                    <img src="" alt="->">
                    <span>ログアウト</span>
                    </NuxtLink>
                </li>
                <li class="nav-share">
                    <form @submit.prevent="submit">
                        <label class="share-label">シェア</label>
                        <textarea v-model="textarea"></textarea>
                        <button class="share-button">シェアする</button>
                    </form>
                </li>
            </ul>
        </nav>
    </aside>
</template>

<script setup>
    import { ref } from 'vue'
const textbox = ref('')
const submit = () => {
        console.log(textarea.value)
    }
</script>