<?php


// includes functions 
if (file_exists(__DIR__ . "/autoload.php")) { 
  include_once __DIR__ . "/autoload.php";
}

// get url data 
if (isset($_GET["likeId"])) {
   $likeUrlId = $_GET["likeId"];

   $databaseOldData = json_decode(file_get_contents("db/posts.json"), true); 

   $likeUpdate = [];

   foreach($databaseOldData as $likeItem){
    if ($likeItem["id"] == $likeUrlId) {
        $likeItem["likes"] = $likeItem["likes"] + 1; 
    }

    array_push($likeUpdate, $likeItem); 
   }

  file_put_contents("db/posts.json", json_encode($likeUpdate)); 

  header("location:index.php");
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible"
        content="IE=edge" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon"
        href="./assets/icons/favicon.ico"
        type="image/x-icon" />
    <title>Facebook – log in or sign up</title>
    <!-- bootstrap -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet"
        href="./assets/css/style.css" />
</head>

<body>
    <!-- HOME HEADER  -->
    <div class="fb-home-header">
        <div class="fb-home-search">
            <a href="#"><img src="./assets/icons/favicon.ico"
                    alt="" /></a>
            <div class="search-box">
                <svg fill="currentColor"
                    viewBox="0 0 16 16"
                    width="1em"
                    height="1em"
                    class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6 xlup9mm x1kky2od">
                    <g fill-rule="evenodd"
                        transform="translate(-448 -544)">
                        <g fill-rule="nonzero">
                            <path
                                d="M10.743 2.257a6 6 0 1 1-8.485 8.486 6 6 0 0 1 8.485-8.486zm-1.06 1.06a4.5 4.5 0 1 0-6.365 6.364 4.5 4.5 0 0 0 6.364-6.363z"
                                transform="translate(448 544)" />
                            <path
                                d="M10.39 8.75a2.94 2.94 0 0 0-.199.432c-.155.417-.23.849-.172 1.284.055.415.232.794.54 1.103a.75.75 0 0 0 1.112-1.004l-.051-.057a.39.39 0 0 1-.114-.24c-.021-.155.014-.356.09-.563.031-.081.06-.145.08-.182l.012-.022a.75.75 0 1 0-1.299-.752z"
                                transform="translate(448 544)" />
                            <path
                                d="M9.557 11.659c.038-.018.09-.04.15-.064.207-.077.408-.112.562-.092.08.01.143.034.198.077l.041.036a.75.75 0 0 0 1.06-1.06 1.881 1.881 0 0 0-1.103-.54c-.435-.058-.867.018-1.284.175-.189.07-.336.143-.433.2a.75.75 0 0 0 .624 1.356l.066-.027.12-.061z"
                                transform="translate(448 544)" />
                            <path
                                d="m13.463 15.142-.04-.044-3.574-4.192c-.599-.703.355-1.656 1.058-1.057l4.191 3.574.044.04c.058.059.122.137.182.24.249.425.249.96-.154 1.41l-.057.057c-.45.403-.986.403-1.411.154a1.182 1.182 0 0 1-.24-.182zm.617-.616.444-.444a.31.31 0 0 0-.063-.052c-.093-.055-.263-.055-.35.024l.208.232.207-.206.006.007-.22.257-.026-.024.033-.034.025.027-.257.22-.007-.007zm-.027-.415c-.078.088-.078.257-.023.35a.31.31 0 0 0 .051.063l.205-.204-.233-.209z"
                                transform="translate(448 544)" />
                        </g>
                    </g>
                </svg>
                <input type="search"
                    placeholder="Search Facebook" />
            </div>
        </div>
        <div class="fb-home-menu">
            <ul>
                <li class="active">
                    <a href="#"><svg viewBox="0 0 28 28"
                            class="x1lliihq x1k90msu x2h7rmj x1qfuztq x5e5rjt"
                            fill="currentColor"
                            height="28"
                            width="28">
                            <path
                                d="M25.825 12.29C25.824 12.289 25.823 12.288 25.821 12.286L15.027 2.937C14.752 2.675 14.392 2.527 13.989 2.521 13.608 2.527 13.248 2.675 13.001 2.912L2.175 12.29C1.756 12.658 1.629 13.245 1.868 13.759 2.079 14.215 2.567 14.479 3.069 14.479L5 14.479 5 23.729C5 24.695 5.784 25.479 6.75 25.479L11 25.479C11.552 25.479 12 25.031 12 24.479L12 18.309C12 18.126 12.148 17.979 12.33 17.979L15.67 17.979C15.852 17.979 16 18.126 16 18.309L16 24.479C16 25.031 16.448 25.479 17 25.479L21.25 25.479C22.217 25.479 23 24.695 23 23.729L23 14.479 24.931 14.479C25.433 14.479 25.921 14.215 26.132 13.759 26.371 13.245 26.244 12.658 25.825 12.29" />
                        </svg></a>
                </li>
                <li>
                    <a href="#"><svg viewBox="0 0 28 28"
                            class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6"
                            fill="currentColor"
                            height="28"
                            width="28">
                            <path
                                d="M8.75 25.25C8.336 25.25 8 24.914 8 24.5 8 24.086 8.336 23.75 8.75 23.75L19.25 23.75C19.664 23.75 20 24.086 20 24.5 20 24.914 19.664 25.25 19.25 25.25L8.75 25.25ZM17.163 12.846 12.055 15.923C11.591 16.202 11 15.869 11 15.327L11 9.172C11 8.631 11.591 8.297 12.055 8.576L17.163 11.654C17.612 11.924 17.612 12.575 17.163 12.846ZM21.75 20.25C22.992 20.25 24 19.242 24 18L24 6.5C24 5.258 22.992 4.25 21.75 4.25L6.25 4.25C5.008 4.25 4 5.258 4 6.5L4 18C4 19.242 5.008 20.25 6.25 20.25L21.75 20.25ZM21.75 21.75 6.25 21.75C4.179 21.75 2.5 20.071 2.5 18L2.5 6.5C2.5 4.429 4.179 2.75 6.25 2.75L21.75 2.75C23.821 2.75 25.5 4.429 25.5 6.5L25.5 18C25.5 20.071 23.821 21.75 21.75 21.75Z" />
                        </svg></a>
                </li>
                <li>
                    <a href="#"><svg viewBox="0 0 28 28"
                            class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6"
                            fill="currentColor"
                            height="28"
                            width="28">
                            <path
                                d="M17.5 23.75 21.75 23.75C22.164 23.75 22.5 23.414 22.5 23L22.5 14 22.531 14C22.364 13.917 22.206 13.815 22.061 13.694L21.66 13.359C21.567 13.283 21.433 13.283 21.34 13.36L21.176 13.497C20.591 13.983 19.855 14.25 19.095 14.25L18.869 14.25C18.114 14.25 17.382 13.987 16.8 13.506L16.616 13.354C16.523 13.278 16.39 13.278 16.298 13.354L16.113 13.507C15.53 13.987 14.798 14.25 14.044 14.25L13.907 14.25C13.162 14.25 12.439 13.994 11.861 13.525L11.645 13.35C11.552 13.275 11.419 13.276 11.328 13.352L11.155 13.497C10.57 13.984 9.834 14.25 9.074 14.25L8.896 14.25C8.143 14.25 7.414 13.989 6.832 13.511L6.638 13.351C6.545 13.275 6.413 13.275 6.32 13.351L5.849 13.739C5.726 13.84 5.592 13.928 5.452 14L5.5 14 5.5 23C5.5 23.414 5.836 23.75 6.25 23.75L10.5 23.75 10.5 17.5C10.5 16.81 11.06 16.25 11.75 16.25L16.25 16.25C16.94 16.25 17.5 16.81 17.5 17.5L17.5 23.75ZM3.673 8.75 24.327 8.75C24.3 8.66 24.271 8.571 24.238 8.483L23.087 5.355C22.823 4.688 22.178 4.25 21.461 4.25L6.54 4.25C5.822 4.25 5.177 4.688 4.919 5.338L3.762 8.483C3.729 8.571 3.7 8.66 3.673 8.75ZM24.5 10.25 3.5 10.25 3.5 12C3.5 12.414 3.836 12.75 4.25 12.75L4.421 12.75C4.595 12.75 4.763 12.69 4.897 12.58L5.368 12.193C6.013 11.662 6.945 11.662 7.59 12.193L7.784 12.352C8.097 12.609 8.49 12.75 8.896 12.75L9.074 12.75C9.483 12.75 9.88 12.607 10.194 12.345L10.368 12.2C11.01 11.665 11.941 11.659 12.589 12.185L12.805 12.359C13.117 12.612 13.506 12.75 13.907 12.75L14.044 12.75C14.45 12.75 14.844 12.608 15.158 12.35L15.343 12.197C15.989 11.663 16.924 11.663 17.571 12.197L17.755 12.35C18.068 12.608 18.462 12.75 18.869 12.75L19.095 12.75C19.504 12.75 19.901 12.606 20.216 12.344L20.38 12.208C21.028 11.666 21.972 11.666 22.62 12.207L23.022 12.542C23.183 12.676 23.387 12.75 23.598 12.75 24.097 12.75 24.5 12.347 24.5 11.85L24.5 10.25ZM24 14.217 24 23C24 24.243 22.993 25.25 21.75 25.25L6.25 25.25C5.007 25.25 4 24.243 4 23L4 14.236C2.875 14.112 2 13.158 2 12L2 9.951C2 9.272 2.12 8.6 2.354 7.964L3.518 4.802C4.01 3.563 5.207 2.75 6.54 2.75L21.461 2.75C22.793 2.75 23.99 3.563 24.488 4.819L25.646 7.964C25.88 8.6 26 9.272 26 9.951L26 11.85C26 13.039 25.135 14.026 24 14.217ZM16 23.75 16 17.75 12 17.75 12 23.75 16 23.75Z" />
                        </svg></a>
                </li>
                <li>
                    <a href="#"><svg viewBox="0 0 28 28"
                            class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6"
                            fill="currentColor"
                            height="28"
                            width="28">
                            <path
                                d="M25.5 14C25.5 7.649 20.351 2.5 14 2.5 7.649 2.5 2.5 7.649 2.5 14 2.5 20.351 7.649 25.5 14 25.5 20.351 25.5 25.5 20.351 25.5 14ZM27 14C27 21.18 21.18 27 14 27 6.82 27 1 21.18 1 14 1 6.82 6.82 1 14 1 21.18 1 27 6.82 27 14ZM7.479 14 7.631 14C7.933 14 8.102 14.338 7.934 14.591 7.334 15.491 6.983 16.568 6.983 17.724L6.983 18.221C6.983 18.342 6.99 18.461 7.004 18.578 7.03 18.802 6.862 19 6.637 19L6.123 19C5.228 19 4.5 18.25 4.5 17.327 4.5 15.492 5.727 14 7.479 14ZM20.521 14C22.274 14 23.5 15.492 23.5 17.327 23.5 18.25 22.772 19 21.878 19L21.364 19C21.139 19 20.97 18.802 20.997 18.578 21.01 18.461 21.017 18.342 21.017 18.221L21.017 17.724C21.017 16.568 20.667 15.491 20.067 14.591 19.899 14.338 20.067 14 20.369 14L20.521 14ZM8.25 13C7.147 13 6.25 11.991 6.25 10.75 6.25 9.384 7.035 8.5 8.25 8.5 9.465 8.5 10.25 9.384 10.25 10.75 10.25 11.991 9.353 13 8.25 13ZM19.75 13C18.647 13 17.75 11.991 17.75 10.75 17.75 9.384 18.535 8.5 19.75 8.5 20.965 8.5 21.75 9.384 21.75 10.75 21.75 11.991 20.853 13 19.75 13ZM15.172 13.5C17.558 13.5 19.5 15.395 19.5 17.724L19.5 18.221C19.5 19.202 18.683 20 17.677 20L10.323 20C9.317 20 8.5 19.202 8.5 18.221L8.5 17.724C8.5 15.395 10.441 13.5 12.828 13.5L15.172 13.5ZM16.75 9C16.75 10.655 15.517 12 14 12 12.484 12 11.25 10.655 11.25 9 11.25 7.15 12.304 6 14 6 15.697 6 16.75 7.15 16.75 9Z" />
                        </svg></a>
                </li>
                <li>
                    <a href="#"><svg viewBox="0 0 28 28"
                            class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6"
                            fill="currentColor"
                            height="28"
                            width="28">
                            <path
                                d="M23.5 9.5H10.25a.75.75 0 00-.75.75v7c0 .414.336.75.75.75H17v5.5H4.5v-19h19v5zm0 14h-5v-6.25a.75.75 0 00-.75-.75H11V11h12.5v12.5zm1.5.25V4.25C25 3.561 24.439 3 23.75 3H4.25C3.561 3 3 3.561 3 4.25v19.5c0 .689.561 1.25 1.25 1.25h19.5c.689 0 1.25-.561 1.25-1.25z" />
                        </svg></a>
                </li>
            </ul>
        </div>
        <div class="fb-home-user">
            <div class="fb-user-item">
                <a href="#"><svg fill="currentColor"
                        viewBox="0 0 44 44"
                        width="1em"
                        height="1em"
                        class="x1lliihq x1k90msu x2h7rmj x1qfuztq x198g3q0 x1qx5ct2 xw4jnvo">
                        <circle cx="7"
                            cy="7"
                            r="6" />
                        <circle cx="22"
                            cy="7"
                            r="6" />
                        <circle cx="37"
                            cy="7"
                            r="6" />
                        <circle cx="7"
                            cy="22"
                            r="6" />
                        <circle cx="22"
                            cy="22"
                            r="6" />
                        <circle cx="37"
                            cy="22"
                            r="6" />
                        <circle cx="7"
                            cy="37"
                            r="6" />
                        <circle cx="22"
                            cy="37"
                            r="6" />
                        <circle cx="37"
                            cy="37"
                            r="6" />
                    </svg></a>
            </div>
            <div class="fb-user-item">
                <a href="#"><svg viewBox="0 0 28 28"
                        alt=""
                        class="x1lliihq x1k90msu x2h7rmj x1qfuztq x198g3q0"
                        fill="currentColor"
                        height="20"
                        width="20">
                        <path
                            d="M14 2.042c6.76 0 12 4.952 12 11.64S20.76 25.322 14 25.322a13.091 13.091 0 0 1-3.474-.461.956 .956 0 0 0-.641.047L7.5 25.959a.961.961 0 0 1-1.348-.849l-.065-2.134a.957.957 0 0 0-.322-.684A11.389 11.389 0 0 1 2 13.682C2 6.994 7.24 2.042 14 2.042ZM6.794 17.086a.57.57 0 0 0 .827.758l3.786-2.874a.722.722 0 0 1 .868 0l2.8 2.1a1.8 1.8 0 0 0 2.6-.481l3.525-5.592a.57.57 0 0 0-.827-.758l-3.786 2.874a.722.722 0 0 1-.868 0l-2.8-2.1a1.8 1.8 0 0 0-2.6.481Z" />
                    </svg></a>
            </div>
            <div class="fb-user-item">
                <a href="#"><svg viewBox="0 0 28 28"
                        alt=""
                        class="x1lliihq x1k90msu x2h7rmj x1qfuztq x198g3q0"
                        fill="currentColor"
                        height="20"
                        width="20">
                        <path
                            d="M7.847 23.488C9.207 23.488 11.443 23.363 14.467 22.806 13.944 24.228 12.581 25.247 10.98 25.247 9.649 25.247 8.483 24.542 7.825 23.488L7.847 23.488ZM24.923 15.73C25.17 17.002 24.278 18.127 22.27 19.076 21.17 19.595 18.724 20.583 14.684 21.369 11.568 21.974 9.285 22.113 7.848 22.113 7.421 22.113 7.068 22.101 6.79 22.085 4.574 21.958 3.324 21.248 3.077 19.976 2.702 18.049 3.295 17.305 4.278 16.073L4.537 15.748C5.2 14.907 5.459 14.081 5.035 11.902 4.086 7.022 6.284 3.687 11.064 2.753 15.846 1.83 19.134 4.096 20.083 8.977 20.506 11.156 21.056 11.824 21.986 12.355L21.986 12.356 22.348 12.561C23.72 13.335 24.548 13.802 24.923 15.73Z" />
                    </svg></a>
            </div>
        </div>
    </div>

    <!-- FB HOME BODY  -->
    <div class="fb-home-body">
        <div class="fb-home-body-sidebar">
            <ul>
                <li>
                    <a href="#">
                        <div class="body-icon">
                            <img src="./assets/images/user.jpg"
                                alt="" />
                        </div>
                        <span>Goutam Ray</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <div class="body-icon"></div>
                        <span>Friends</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <div class="body-icon"></div>
                        <span>Groups</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <div class="body-icon"></div>
                        <span>Marketplace</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <div class="body-icon"></div>
                        <span>Watch</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <div class="body-icon"></div>
                        <span>Watch</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="fb-home-timeline-area">
            <div class="fb-home-timeline">
                <!-- Story Box  -->
                <div class="story-box">
                    <div class="story-box-header">
                        <ul>
                            <li>
                                <a href="#">
                                    <svg fill="currentColor"
                                        viewBox="0 0 20 20"
                                        width="1em"
                                        height="1em"
                                        class="x1lliihq x1k90msu x2h7rmj x1qfuztq x1qq9wsj x1qx5ct2 xw4jnvo">
                                        <g fill-rule="evenodd"
                                            transform="translate(-446 -350)">
                                            <path
                                                d="M457 368.832a.5.5 0 0 0 .883.323l1.12-1.332a.876.876 0 0 1 .679-.323h3.522a2.793 2.793 0 0 0 2.796-2.784v-10.931a2.793 2.793 0 0 0-2.796-2.785h-3.454a2.75 2.75 0 0 0-2.75 2.75v15.082zm-1.5 0a.5.5 0 0 1-.883.323l-1.12-1.332a.876.876 0 0 0-.679-.323h-3.522a2.793 2.793 0 0 1-2.796-2.784v-10.931a2.793 2.793 0 0 1 2.796-2.785h3.454a2.75 2.75 0 0 1 2.75 2.75v15.082z" />
                                        </g>
                                    </svg>
                                    <span>Stories</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg fill="currentColor"
                                        viewBox="0 0 20 20"
                                        width="1em"
                                        height="1em"
                                        class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6 x1qx5ct2 xw4jnvo">
                                        <g fill-rule="evenodd"
                                            transform="translate(-446 -350)">
                                            <path
                                                d="M454.59 355h4.18l-2.4-4h-3.28c-.22 0-.423.008-.624.017L454.59 355zm6.514 0h3.695c-.226-1.031-.65-1.79-1.326-2.489-1.061-1.025-2.248-1.488-4.392-1.511h-.379l2.401 4zm-8.78 0-1.942-3.64c-.73.247-1.315.63-1.868 1.165-.668.69-1.09 1.445-1.315 2.475h5.125zm7.043 7.989a.711.711 0 0 1-.22.202l-4.573 2.671-.05.027a.713.713 0 0 1-1.024-.643v-5.343l.002-.056a.714.714 0 0 1 1.072-.56l4.572 2.67.054.036a.714.714 0 0 1 .167.996zm-12.366-5.99V363.083l.001.03v.112l.005.048h.001c.05 2.02.513 3.176 1.506 4.203 1.102 1.066 2.324 1.525 4.577 1.525h5.99c2.144-.023 3.331-.486 4.392-1.511 1.005-1.04 1.467-2.198 1.517-4.217h.003c.003-.1.005-.1.006-.204l.001-.156V357h-18z" />
                                        </g>
                                    </svg>
                                    <span>Reels</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="story-box-body">
                        <div class="story-area">
                            <div class="story-item auth-user-story"
                                style="background-image: url('./assets/images/user.jpg')">
                                <div class="auth-story-create">
                                    <button>
                                        <svg fill="currentColor"
                                            viewBox="0 0 20 20"
                                            width="1em"
                                            height="1em"
                                            class="x1lliihq x1k90msu x2h7rmj x1qfuztq x14ctfv x1qx5ct2 xw4jnvo">
                                            <g fill-rule="evenodd"
                                                transform="translate(-446 -350)">
                                                <g fill-rule="nonzero">
                                                    <path d="M95 201.5h13a1 1 0 1 0 0-2H95a1 1 0 1 0 0 2z"
                                                        transform="translate(354.5 159.5)"></path>
                                                    <path d="M102.5 207v-13a1 1 0 1 0-2 0v13a1 1 0 1 0 2 0z"
                                                        transform="translate(354.5 159.5)"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
                                    <p>Create Story</p>
                                </div>
                            </div>

                            <div class="story-item"
                                style="
                    background-image: url('https://images.unsplash.com/photo-1630304565761-d6f8d5a0facd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8Y3V0ZSUyMGJhYnl8ZW58MHx8MHx8&w=1000&q=80');
                  ">
                                <div class="story-user">
                                    <img src="./assets/images/user.jpg"
                                        alt="" />
                                </div>
                                <span>Goutam Ray</span>
                            </div>

                            <div class="story-item"
                                style="
                    background-image: url('https://images.unsplash.com/photo-1630304565761-d6f8d5a0facd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8Y3V0ZSUyMGJhYnl8ZW58MHx8MHx8&w=1000&q=80');
                  ">
                                <div class="story-user">
                                    <img src="./assets/images/user.jpg"
                                        alt="" />
                                </div>
                                <span>Goutam Ray</span>
                            </div>

                            <div class="story-item"
                                style="
                    background-image: url('https://images.unsplash.com/photo-1630304565761-d6f8d5a0facd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8Y3V0ZSUyMGJhYnl8ZW58MHx8MHx8&w=1000&q=80');
                  ">
                                <div class="story-user">
                                    <img src="./assets/images/user.jpg"
                                        alt="" />
                                </div>
                                <span>Goutam Ray</span>
                            </div>

                            <div class="story-item"
                                style="
                    background-image: url('https://images.unsplash.com/photo-1630304565761-d6f8d5a0facd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8Y3V0ZSUyMGJhYnl8ZW58MHx8MHx8&w=1000&q=80');
                  ">
                                <div class="story-user">
                                    <img src="./assets/images/user.jpg"
                                        alt="" />
                                </div>
                                <span>Goutam Ray</span>
                            </div>
                        </div>
                    </div>
                </div>

                <?php

/**
 * 
 * post comment manage 
 */

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["comment-submit"])) {


    // get form values 
    $comment_Id = $_POST["comment_id"]; 
    $comment_user = $_POST["comment_user_name"]; 
    $comment_content = $_POST["comment_content"]; 

    // upload comment user photo
   $user_photo_name = move([
        "tmp_name" => $_FILES["comment_user_photo"]["tmp_name"],
        "name" => $_FILES["comment_user_photo"]["name"],
    ], "media/user-photo/");


  // comment photo upload only  
  $comment_photo_link = null;

   if (!empty( $_FILES["comment_photo"]["name"])) {
   $comment_photo_link = move([
        "tmp_name" => $_FILES["comment_photo"]["tmp_name"],
        "name" => $_FILES["comment_photo"]["name"],
    ], "media/comments/");
   }

   // update comment 
   $commentData = json_decode(file_get_contents("db/posts.json"), true);

  $comment_update = []; 

   foreach($commentData as $commentItem){
      if ($commentItem["id"] == $comment_Id ) {
          array_push($commentItem["comments"], [
            "id"              => createId("comment"),
            "user"            => $comment_user,
            "user_photo"      => $user_photo_name,
            "comment_photo"   => $comment_photo_link ? $comment_photo_link  : null,
            "comment_content" => $comment_content ? $comment_content  : null,    
          ]);
      }

      array_push($comment_update, $commentItem); 
   }


   file_put_contents("db/posts.json", json_encode($comment_update)); 



}

?>



                <?php

/**
 * 
 * create user post 
 */

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["post_submit"])) {
      // get form data 
       $post_user_name = $_POST["post_user_name"];
       $post_content = $_POST["post_content"];


       // form validation 
       if (empty($post_user_name) || !$_FILES["post_user_photo"]["name"]) {
            echo createAlert("Auth User Not Found!"); 
       }else{
            // user single photo upload 
          $user_photo =  move([
                "tmp_name" => $_FILES["post_user_photo"]["tmp_name"],
                "name" => $_FILES["post_user_photo"]["name"],
            ], "media/user-photo/");


            // posts multiple photo upload 
            $posts_photos = [];

            if (!empty($_FILES["post_photos"]["name"][0])) {
                for ($i=0; $i < count($_FILES["post_photos"]["name"]) ; $i++) { 
                  $posts_photos_item =  move([
                        "tmp_name" =>  $_FILES["post_photos"]["tmp_name"][$i],
                        "name" =>  $_FILES["post_photos"]["name"][$i],
                       ], "media/posts/");

                array_push($posts_photos, $posts_photos_item); 
                }
            };
     
            // video upload 
            $posts_video = null;

            if ($_FILES["post_video"]["name"]) {
                $posts_video =  move([
                    "name" => $_FILES["post_video"]["name"],
                    "tmp_name" => $_FILES["post_video"]["tmp_name"],
                ], "media/videos/");
            };


            // now update database 
            $posts = json_decode(file_get_contents("db/posts.json"), true); 

            array_push($posts, [
                "id"           => createId("posts"),
                "user_name"    => $post_user_name,
                "user_photo"   =>  $user_photo,
                "posts_photos" => $posts_photos,
                "posts_content"=> $post_content ? $post_content : null,
                "posts_video"  => $posts_video,
                "comments"     => [],
                "likes"        => 0,
                "share"        => 0,
                "createdAt"    => time(),
                "updatedAt"    => null,
            ]); 


            file_put_contents("db/posts.json", json_encode($posts));




    }

    }

?>



                <!-- Create Post Box  -->
                <div class="create-post">
                    <div class="create-post-header">
                        <img src="./assets/images/user.jpg"
                            alt="" />
                        <button data-bs-toggle="modal"
                            data-bs-target="#create_post_modal">Whats on your mind ?</button>
                    </div>
                    <div class="divider-0"></div>
                    <div class="create-post-footer">
                        <ul>
                            <li>
                                <div class="post-icon"></div>
                                <span>Live Video</span>
                            </li>
                            <li>
                                <div class="post-icon"></div>
                                Photo/video
                            </li>
                            <li>
                                <div class="post-icon"></div>
                                Feeling/ctivity
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- show all user post  -->
                <?php
              
              /**
               * 
               * get all posts and show 
               */

               $all_posts = array_reverse(json_decode(file_get_contents("db/posts.json"))); 

               if (count($all_posts) > 0 ) : 

                foreach($all_posts as $single_post) : 


              ?>

                <!-- User Post  -->
                <div class="user-post">
                    <div class="user-post-header">
                        <div class="post-info">
                            <img src="media/user-photo/<?php echo $single_post -> user_photo ?>"
                                alt="" />
                            <div class="user-details">
                                <a class="author"
                                    href="#"><?php echo $single_post -> user_name ?></a>
                                <span><?php echo timeAgo($single_post -> createdAt)?>
                                    <svg fill="currentColor"
                                        viewBox="0 0 16 16"
                                        width="1em"
                                        height="1em"
                                        class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6 x1kpxq89 xsmyaan"
                                        title="Shared with Public">
                                        <title>Shared with Public</title>
                                        <g fill-rule="evenodd"
                                            transform="translate(-448 -544)">
                                            <g>
                                                <path
                                                    d="M109.5 408.5c0 3.23-2.04 5.983-4.903 7.036l.07-.036c1.167-1 1.814-2.967 2-3.834.214-1 .303-1.3-.5-1.96-.31-.253-.677-.196-1.04-.476-.246-.19-.356-.59-.606-.73-.594-.337-1.107.11-1.954.223a2.666 2.666 0 0 1-1.15-.123c-.007 0-.007 0-.013-.004l-.083-.03c-.164-.082-.077-.206.006-.36h-.006c.086-.17.086-.376-.05-.529-.19-.214-.54-.214-.804-.224-.106-.003-.21 0-.313.004l-.003-.004c-.04 0-.084.004-.124.004h-.037c-.323.007-.666-.034-.893-.314-.263-.353-.29-.733.097-1.09.28-.26.863-.8 1.807-.22.603.37 1.166.667 1.666.5.33-.11.48-.303.094-.87a1.128 1.128 0 0 1-.214-.73c.067-.776.687-.84 1.164-1.2.466-.356.68-.943.546-1.457-.106-.413-.51-.873-1.28-1.01a7.49 7.49 0 0 1 6.524 7.434"
                                                    transform="translate(354 143.5)"></path>
                                                <path
                                                    d="M104.107 415.696A7.498 7.498 0 0 1 94.5 408.5a7.48 7.48 0 0 1 3.407-6.283 5.474 5.474 0 0 0-1.653 2.334c-.753 2.217-.217 4.075 2.29 4.075.833 0 1.4.561 1.333 2.375-.013.403.52 1.78 2.45 1.89.7.04 1.184 1.053 1.33 1.74.06.29.127.65.257.97a.174.174 0 0 0 .193.096"
                                                    transform="translate(354 143.5)"></path>
                                                <path fill-rule="nonzero"
                                                    d="M110 408.5a8 8 0 1 1-16 0 8 8 0 0 1 16 0zm-1 0a7 7 0 1 0-14 0 7 7 0 0 0 14 0z"
                                                    transform="translate(354 143.5)"></path>
                                            </g>
                                        </g>
                                    </svg></span>
                            </div>
                        </div>
                        <div class="post-menu">
                            <button>
                                <svg fill="currentColor"
                                    viewBox="0 0 20 20"
                                    width="1em"
                                    height="1em"
                                    class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6 x1qx5ct2 xw4jnvo">
                                    <g fill-rule="evenodd"
                                        transform="translate(-446 -350)">
                                        <path
                                            d="M458 360a2 2 0 1 1-4 0 2 2 0 0 1 4 0m6 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0m-12 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0">
                                        </path>
                                    </g>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="post-body">
                        <div class="post-content">
                            <?php 
                                if ($single_post-> posts_content): 
                            ?>
                            <p>
                                <?php echo $single_post-> posts_content; ?>
                            </p>
                            <?php 
                                endif; 
                            ?>
                        </div>
                    </div>
                    <?php if(count($single_post-> posts_photos ) > 0) : ?>

                    <!-- single photo manage -->
                    <?php if (count($single_post-> posts_photos ) == 1 ) : ?>
                    <div class="post-media">
                        <img src="/media/posts/<?php echo $single_post-> posts_photos[0] ?>"
                            alt="" />
                    </div>
                    <?php endif; ?>

                    <!-- double photo manage -->
                    <?php if (count($single_post-> posts_photos ) == 2 ) : ?>
                    <div class="post-media photos-2 ">
                        <?php foreach($single_post-> posts_photos as $photos2 ) :  ?>
                        <img src="/media/posts/<?php echo $photos2 ?>"
                            alt="" />
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <!-- Three photo manage -->
                    <?php if (count($single_post-> posts_photos ) == 3 ) : ?>
                    <div class="post-media photos-3 ">
                        <?php foreach($single_post-> posts_photos as $photos3 ) :  ?>
                        <img src="/media/posts/<?php echo $photos3 ?>"
                            alt="" />
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>


                    <!-- Four photo manage -->
                    <?php if (count($single_post-> posts_photos ) == 4 ) : ?>
                    <div class="post-media photos-4 ">
                        <?php foreach($single_post-> posts_photos as $photos4 ) :  ?>
                        <img src="/media/posts/<?php echo $photos4 ?>"
                            alt="" />
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <?php endif; ?>


                    <!-- post video  -->
                    <?php if($single_post-> posts_video)  : ?>
                    <div class="post-video">
                        <video controls>
                            <source src="/media/videos/<?php echo $single_post-> posts_video ?>"">
                            </video>
                    </div>
                    <?php endif; ?>

                    <div class="
                                post-comments">
                            <div class="comments-header">
                                <div class="reaction">
                                    <div class="reaction-icon">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        viewBox="0 0 16 16">
                                                        <defs>
                                                            <linearGradient id="a"
                                                                x1="50%"
                                                                x2="50%"
                                                                y1="0%"
                                                                y2="100%">
                                                                <stop offset="0%"
                                                                    stop-color="#FF6680" />
                                                                <stop offset="100%"
                                                                    stop-color="#E61739" />
                                                            </linearGradient>
                                                            <filter id="c"
                                                                width="118.8%"
                                                                height="118.8%"
                                                                x="-9.4%"
                                                                y="-9.4%"
                                                                filterUnits="objectBoundingBox">
                                                                <feGaussianBlur in="SourceAlpha"
                                                                    result="shadowBlurInner1"
                                                                    stdDeviation="1" />
                                                                <feOffset dy="-1"
                                                                    in="shadowBlurInner1"
                                                                    result="shadowOffsetInner1" />
                                                                <feComposite in="shadowOffsetInner1"
                                                                    in2="SourceAlpha"
                                                                    k2="-1"
                                                                    k3="1"
                                                                    operator="arithmetic"
                                                                    result="shadowInnerInner1" />
                                                                <feColorMatrix in="shadowInnerInner1"
                                                                    values="0 0 0 0 0.710144928 0 0 0 0 0 0 0 0 0 0.117780134 0 0 0 0.349786932 0" />
                                                            </filter>
                                                            <path id="b"
                                                                d="M8 0a8 8 0 100 16A8 8 0 008 0z" />
                                                        </defs>
                                                        <g fill="none">
                                                            <use fill="url(#a)"
                                                                xlink:href="#b" />
                                                            <use fill="black"
                                                                filter="url(#c)"
                                                                xlink:href="#b" />
                                                            <path fill="white"
                                                                d="M10.473 4C8.275 4 8 5.824 8 5.824S7.726 4 5.528 4c-2.114 0-2.73 2.222-2.472 3.41C3.736 10.55 8 12.75 8 12.75s4.265-2.2 4.945-5.34c.257-1.188-.36-3.41-2.472-3.41" />
                                                        </g>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        viewBox="0 0 16 16">
                                                        <defs>
                                                            <linearGradient id="a"
                                                                x1="50%"
                                                                x2="50%"
                                                                y1="0%"
                                                                y2="100%">
                                                                <stop offset="0%"
                                                                    stop-color="#18AFFF" />
                                                                <stop offset="100%"
                                                                    stop-color="#0062DF" />
                                                            </linearGradient>
                                                            <filter id="c"
                                                                width="118.8%"
                                                                height="118.8%"
                                                                x="-9.4%"
                                                                y="-9.4%"
                                                                filterUnits="objectBoundingBox">
                                                                <feGaussianBlur in="SourceAlpha"
                                                                    result="shadowBlurInner1"
                                                                    stdDeviation="1" />
                                                                <feOffset dy="-1"
                                                                    in="shadowBlurInner1"
                                                                    result="shadowOffsetInner1" />
                                                                <feComposite in="shadowOffsetInner1"
                                                                    in2="SourceAlpha"
                                                                    k2="-1"
                                                                    k3="1"
                                                                    operator="arithmetic"
                                                                    result="shadowInnerInner1" />
                                                                <feColorMatrix in="shadowInnerInner1"
                                                                    values="0 0 0 0 0 0 0 0 0 0.299356041 0 0 0 0 0.681187726 0 0 0 0.3495684 0" />
                                                            </filter>
                                                            <path id="b"
                                                                d="M8 0a8 8 0 00-8 8 8 8 0 1016 0 8 8 0 00-8-8z" />
                                                        </defs>
                                                        <g fill="none">
                                                            <use fill="url(#a)"
                                                                xlink:href="#b" />
                                                            <use fill="black"
                                                                filter="url(#c)"
                                                                xlink:href="#b" />
                                                            <path fill="white"
                                                                d="M12.162 7.338c.176.123.338.245.338.674 0 .43-.229.604-.474.725a.73.73 0 01.089.546c-.077.344-.392.611-.672.69.121.194.159.385.015.62-.185.295-.346.407-1.058.407H7.5c-.988 0-1.5-.546-1.5-1V7.665c0-1.23 1.467-2.275 1.467-3.13L7.361 3.47c-.005-.065.008-.224.058-.27.08-.079.301-.2.635-.2.218 0 .363.041.534.123.581.277.732.978.732 1.542 0 .271-.414 1.083-.47 1.364 0 0 .867-.192 1.879-.199 1.061-.006 1.749.19 1.749.842 0 .261-.219.523-.316.666zM3.6 7h.8a.6.6 0 01.6.6v3.8a.6.6 0 01-.6.6h-.8a.6.6 0 01-.6-.6V7.6a.6.6 0 01.6-.6z" />
                                                        </g>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="#"><?php echo $single_post-> likes ?> likes </a>
                                </div>
                                <div class="counts">
                                    <a href="#"><?php echo count($single_post-> comments) ?> Comments</a>
                                </div>
                            </div>
                            <div class="divider-0"></div>
                            <div class="comments-menu">
                                <ul>
                                    <li>
                                        <a href="?likeId=<?php echo $single_post-> id ?>"
                                            class="d-flex gap-1 align-items-center">
                                            <span class="comment-icon"></span>
                                            Like</a>
                                    </li>

                                    <li id="comment_click"
                                        data-bs-toggle="modal"
                                        data-bs-target="#create_comment_modal"
                                        commentId="<?php echo $single_post-> id ?>">
                                        <span class="comment-icon"></span>
                                        <span> Comment</span>
                                    </li>

                                    <li>
                                        <span class="comment-icon"></span>
                                        <span>Share</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="divider-0"></div>
                            <div class="comments-area"></div>
                    </div>
                    <div class="post-comment-area">
                        <?php foreach($single_post-> comments as $comment ) : ?>
                        <div class="single-comment-item">
                            <div class="main-part-comment">
                                <img src="media/user-photo/<?php echo $comment -> user_photo ?>"
                                    alt="">
                                <div class="comment-content">
                                    <p><?php echo $comment -> user ?></p>
                                    <p><?php echo $comment -> comment_content ?> </p>
                                    <div class="comment-photo">
                                        <img src="media/comments/<?php echo $comment -> comment_photo ?>"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php endforeach; ?>

                <?php else : ?>
                <div class="user-post">
                    <div class="user-post-header text-center">
                        <h4 class="text-center"> Posts Not Found </h4>
                    </div>
                </div>

                <?php endif;  ?>
            </div>
        </div>
    </div>






    <!-- create post modal start  -->
    <div class="modal fade"
        id="create_post_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="text-center"> Create Post </h3>
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>"
                        method="POST"
                        enctype="multipart/form-data">
                        <div class="my-2">
                            <label for="nam"> Auth User Name </label>
                            <input type="text"
                                id="nam"
                                name="post_user_name"
                                class="form-control"
                                placeholder="Name">
                        </div>
                        <div class="my-2">
                            <label for="pic"> Auth User Photo </label>
                            <input type="file"
                                id="pic"
                                name="post_user_photo"
                                class="form-control">
                        </div>
                        <div class="my-2">
                            <label for="pic"> Post Content </label>
                            <textarea name="post_content"
                                class="form-control"></textarea>
                        </div>
                        <div class="my-2">
                            <label for="pic"> Post Photo </label>
                            <input type="file"
                                id="pic"
                                multiple
                                name="post_photos[]"
                                class="form-control">
                        </div>
                        <div class="my-2">
                            <label for="nam"> Video Content </label>
                            <input type="file"
                                id="pic"
                                accept="video/*"
                                name="post_video"
                                class="form-control">
                        </div>
                        <div class="my-2">
                            <input type="submit"
                                value="Post"
                                name="post_submit"
                                class="btn btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <!-- create comment modal  start  -->
    <div class="modal fade"
        id="create_comment_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="text-center"> Create Comment </h3>
                    <form action=""
                        method="Post"
                        enctype="multipart/form-data">
                        <div class="my-2">
                            <label for="nam"> Auth User Name </label>
                            <input type="text"
                                id="nam"
                                class="form-control"
                                placeholder="Name"
                                name="comment_user_name">
                        </div>
                        <div class="my-2">
                            <label for="pic"> Auth User Photo </label>
                            <input type="file"
                                id="pic"
                                class="form-control"
                                name="comment_user_photo">
                        </div>
                        <div class="my-2">

                            <input type="hidden"
                                id="comment_id"
                                class="form-control"
                                placeholder="Id"
                                name="comment_id">
                        </div>
                        <div class="my-2">
                            <label for="pic"> Comment Content </label>
                            <textarea name="comment_content"
                                class="form-control"
                                id=""></textarea>
                        </div>
                        <div class="my-2">
                            <label for="pic"> Comment Photo </label>
                            <input type="file"
                                id="pic"
                                name="comment_photo"
                                class="form-control">
                        </div>
                        <div class="my-2">
                            <input type="submit"
                                name="comment-submit"
                                value="Comment"
                                class="btn btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- main css  -->
    <script src="./assets/js/main.js"></script>


    <script>
    const liElements = document.querySelectorAll("[data-bs-target='#create_comment_modal']");
    const InputComId = document.getElementById("comment_id");

    liElements.forEach((li) => {
        li.onclick = () => {
            const CommentLiId = li.getAttribute("commentId");

            InputComId.value = CommentLiId;
        };
    });
    </script>
</body>

</html>
