<div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden -z-100">
    <svg class="absolute -top-[20vw] -right-[20vw] h-[80vw] w-[80vw] opacity-70" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <radialGradient id="gradient" cx="50%" cy="50%" r="35%">
                <stop offset="0%" stop-color="var(--ndn-primary)" />
                <stop offset="100%" stop-color="var(--ndn-background)" stop-opacity="0" />
            </radialGradient>
            <filter id="blur">
                <feGaussianBlur stdDeviation="100" />
            </filter>
        </defs>
        <rect width="100%" height="100%" fill="url(#gradient)" filter="url(#blur)" />
    </svg>

    <svg class="absolute -bottom-[30vw] right-[10vw] h-[70vw] w-[70vw] opacity-50" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <radialGradient id="gradient2" cx="50%" cy="50%" r="35%">
                <stop offset="0%" stop-color="var(--ndn-secondary)" />
                <stop offset="100%" stop-color="var(--ndn-background)" stop-opacity="0" />
            </radialGradient>
            <filter id="blur2">
                <feGaussianBlur stdDeviation="100" />
            </filter>
        </defs>
        <rect width="100%" height="100%" fill="url(#gradient2)" filter="url(#blur2)" />
    </svg>

    <svg class="absolute bottom-0 -left-[30%] h-[60vw] w-[60vw] opacity-40" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <radialGradient id="gradient3" cx="50%" cy="50%" r="35%">
                <stop offset="0%" stop-color="var(--ndn-tertiary)" />
                <stop offset="100%" stop-color="var(--ndn-background)" stop-opacity="0" />
            </radialGradient>
            <filter id="blur3">
                <feGaussianBlur stdDeviation="100" />
            </filter>
        </defs>
        <rect width="100%" height="100%" fill="url(#gradient3)" filter="url(#blur3)" />
    </svg>

    <canvas class="grain w-full h-full opacity-30" />
</div>
