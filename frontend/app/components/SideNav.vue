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

                        <p v-if="errors.textarea" class="errors">{{ errors.textarea }}</p>
                        <button class="share-button">シェアする</button>
                    </form>
                </li>
            </ul>
        </nav>
    </aside>
</template>

<script setup>
import { useForm } from 'vee-validate'

const { defineField, handleSubmit, errors } = useForm({
    validationSchema: {
        textarea: (value) => {
            if (!value) {
                return '投稿内容を入力してください'
            }

            if (value.length > 120) {
                return '投稿内容は120文字以内で入力してください'
            }

            return true
        }
    }
})
const [textarea] = defineField('textarea')

const submit = handleSubmit(async () => {
    console.log('バリデーションOK')

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
},
() => {
        console.log('バリデーションNG')
    }

)
</script>