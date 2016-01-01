<?php

return [
    'plugin' => [
        'name' => 'Recipes',
        'description' => 'Ajouter et supprimer facilement des recettes de cuisine sur OctoberCMS',
        'author' => 'Valezdesign'
    ],
    'menu' => [
        'recipes' => 'Recettes',
        'posts' => 'Posts',
    ],
    'title' => [
        'posts' => 'post',
    ],
    'new' => [
        'posts' => 'Nouvelle recette',
    ],
    'form' => [
        // General
        'statistics' => 'Statistics',
        'created' => 'Crée à',
        'updated' => 'Mis à jour à',
        // Posts
        'title' => 'Titre',
        'slug' => 'Slug',
        'introductory' => 'Introduction',
        'content' => 'Content',
        'image' => 'Image',
        'status' => 'Status',
        'status_published' => 'Published',
        'status_hide' => 'Hide',
        'status_draft' => 'Supprimée',
        'view' => 'view',
        'published' => 'Publiée le',
        'send' => 'Send the e-mail to subscribers.',
        // Subscribers
        'name' => 'Name',
        'email' => 'E-mail',
        'common' => 'Common',
        'mail' => 'mail'
    ],
    'button' => [
        'activate' => 'Activée',
        'deactivate' => 'Désactivée',
        'active' => 'Active',
        'inactive' => 'Inactive',
        'return' => 'Précédent'
    ],
    'flash' => [
        'activate' => 'La recette a bien été mise en ligne.',
        'deactivate' => 'La recette a bien été désactivée.',
        'delete' => 'Attention! Tu es sur de vouloir supprimer cette recette?',
        'remove' => 'La recette a bien été supprimée.'
    ],
    'widget' => [
        'posts' => 'News - Posts',
        'subscribers' => 'News - Subscribers',
        'show_total' => 'Show total',
        'show_active' => 'Show active',
        'show_inactive' => 'Show inactive',
        'show_draft' => 'Show draft',
        'total' => 'Total'
    ],
    'component' => [
        'posts' => 'Display posts',
        'post' => 'Show post content',
        'form' => 'Subscriber form',
        'stat' => 'View statistics'
    ],
    'permission' => [
        'posts' => 'Manage posts',
        'subscribers' => 'Manage subscribers'
    ],
    'settings' => [
        'post_title' => 'Post',
        'post_description' => 'Displays a post on the page.',
        'post_slug' => 'Post slug',
        'post_slug_description' => "Look up the post using the supplied slug value.",
        'posts_title' => 'Post List',
        'posts_description' => 'Displays a list of latest posts on the page.',
        'posts_pagination' => 'Page number',
        'posts_pagination_description' => 'This value is used to determine what page the user is on.',
        'posts_per_page' => 'Posts per page',
        'posts_per_page_validation' => 'Invalid format of the posts per page value',
        'posts_no_posts' => 'No posts message',
        'posts_no_posts_description' => 'Message to display in the post list in case if there are no posts. This property is used by the default component partial.',
        'posts_no_posts_found' => 'No posts found',
        'posts_order' => 'Post order',
        'posts_order_decription' => 'Attribute on which the posts should be ordered',
        'posts_post' => 'Post page',
        'posts_post_description' => 'Name of the post page file for the "Learn more" links. This property is used by the default component partial.',
    ],
    'sorting' => [
        'title_asc' => 'Titre (ascending)',
        'title_desc' => 'Titre (descending)',
        'created_at_asc' => 'Created (ascending)',
        'created_at_desc' => 'Created (descending)',
        'updated_at_asc' => 'Updated (ascending)',
        'updated_at_desc' => 'Updated (descending)',
        'published_at_asc' => 'Published (ascending)',
        'published_at_desc' => 'Published (descending)'
    ]
];
