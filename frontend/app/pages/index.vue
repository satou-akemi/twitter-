<template>
    <div class="layout">
    <SideNav />
    <main>
        <div class="message-title">
            <h3>ホーム</h3>
        </div>
        <ul>
            <li v-for="post in posts" :key="post.id">
                <div class="post-header">
                    <span class="user-name">{{ post.user.name }}</span>
                    <button class="like-button"
                    @click="toggleLike(post.id)">
                        <img src="/assets/heart.png" alt="♡" class="heart-logo">
                    </button>
                    <span class="like-count">{{ post.likes_count }}</span>
                    <button class="delete-button"
                    @click="deletePost(post.id)">
                        <img src="/assets/cross.png" alt="×" class="cross-logo">
                    </button>
                    <NuxtLink :to="`/comment/${post.id}`">
                        <img src="/assets/feather.png" alt="->" class="feather-logo">
                    </NuxtLink>
                    <span class="comment-count">{{ post.comments_count }}</span>
                </div>
                <p class="post-message">{{ post.text }}</p>
            </li>
        </ul>
    </main>
    </div>
</template>

<script setup>
const posts = ref([])

const fetchPosts = async (id) => {
    posts.value = await $fetch('http://localhost/api/posts')
}

await fetchPosts()

const toggleLike = async (id) => {
    const res = await $fetch(`http://localhost/api/posts/${id}/like`, {
        method:'POST'
    })

    await fetchPosts()
}

const deletePost = async (id) => {
    await $fetch(`http://localhost/api/posts/${id}`, {
        method: 'DELETE'
    })

    await fetchPosts()
}
</script>