<template>
    <aside>
        <nav>
            <NuxtLink to="/">
                <img class="share-logo" src="/assets/logo.png" alt="SHARE">
            </NuxtLink>
            <ul>
                <li class="nav-home">
                    <NuxtLink to="/">
                    <img class="home-logo" src="/assets/home.png" alt="⌂">
                    <span>ホーム</span>
                    </NuxtLink>
                </li>
                <li class="nav-logout">
                    <NuxtLink to="/login">
                    <img class="logout-logo" src="/assets/logout.png" alt="->">
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
const textarea = ref('')
const submit = async() => {
    const res = await $fetch(
        'http://localhost/api/posts',
        {
            method: 'POST',
            body: {
                text:textarea.value
                }
            }
    )
    console.log(res)

    textarea.value = ''
    window.location.reload()
    }
</script>