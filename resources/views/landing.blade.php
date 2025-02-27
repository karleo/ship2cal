<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipment Rates</title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        .font-pacifico { font-family: 'Pacifico', cursive; }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: {
                            DEFAULT: '#001F3F',
                            light: '#003366',
                            dark: '#00172B',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-navy">
    <div x-data="heroGeometric()" x-init="init()" class="relative min-h-screen w-full flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/[0.05] via-transparent to-cyan-500/[0.05] blur-3xl"></div>

        <div class="absolute inset-0 overflow-hidden">
            @foreach($shapes as $shape)
                <div x-ref="shape{{ $loop->index }}" class="absolute {{ $shape['class'] }}">
                    <div class="relative" :style="{ width: '{{ $shape['width'] }}px', height: '{{ $shape['height'] }}px' }">
                        <div class="absolute inset-0 rounded-full bg-gradient-to-r to-transparent {{ $shape['gradient'] }} backdrop-blur-[2px] border-2 border-white/[0.15] shadow-[0_8px_32px_0_rgba(255,255,255,0.1)] after:absolute after:inset-0 after:rounded-full after:bg-[radial-gradient(circle_at_50%_50%,rgba(255,255,255,0.2),transparent_70%)]"></div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="relative z-10 container mx-auto px-4 md:px-6">
            <div class="max-w-3xl mx-auto text-center">
                <div x-ref="badge" x-cloak class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/[0.03] border border-white/[0.08] mb-8 md:mb-12">
                    <img src="https://kokonutui.com/logo.svg" alt="Kokonut UI" width="20" height="20">
                    <span class="text-sm text-white/60 tracking-wide">{{ $badge }}</span>
                </div>

                <h1 x-ref="title" x-cloak class="text-4xl sm:text-6xl md:text-8xl font-bold mb-6 md:mb-8 tracking-tight">
                    <span class="bg-clip-text text-transparent bg-gradient-to-b from-white to-white/80">{{ $title1 }}</span>
                    <br>
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-300 via-white/90 to-blue-300 font-pacifico">
                        {{ $title2 }}
                    </span>
                </h1>

                <p x-ref="description" x-cloak class="text-base sm:text-lg md:text-xl text-white/40 mb-8 leading-relaxed font-light tracking-wide max-w-xl mx-auto px-4">
                    * PrimEx Global * <a href="{{ route('shipment_calculator.index') }}" class="py-4 px-2 text-gray-500 font-semibold hover:text-yellow-500 transition duration-300" > Prime Logistics FZCO </a> * QARAT *.
                </p>
            </div>
        </div>

        <div class="absolute inset-0 bg-gradient-to-t from-navy via-transparent to-navy-dark/80 pointer-events-none"></div>
    </div>

    <script>
        function heroGeometric() {
            return {
                init() {
                    this.animateShapes();
                    this.animateContent();
                },
                animateShapes() {
                    const shapes = this.$refs;
                    Object.keys(shapes).forEach((key, index) => {
                        if (key.startsWith('shape')) {
                            gsap.fromTo(shapes[key],
                                { opacity: 0, y: -150, rotation: -15 },
                                {
                                    opacity: 1,
                                    y: 0,
                                    rotation: 0,
                                    duration: 2.4,
                                    delay: 0.3 + index * 0.1,
                                    ease: "power3.out"
                                }
                            );
                            gsap.to(shapes[key].firstElementChild, {
                                y: 15,
                                duration: 12,
                                repeat: -1,
                                yoyo: true,
                                ease: "sine.inOut"
                            });
                        }
                    });
                },
                animateContent() {
                    const elements = [this.$refs.badge, this.$refs.title, this.$refs.description];
                    elements.forEach((el, index) => {
                        gsap.fromTo(el,
                            { opacity: 0, y: 30 },
                            {
                                opacity: 1,
                                y: 0,
                                duration: 1,
                                delay: 0.5 + index * 0.2,
                                ease: "power3.out"
                            }
                        );
                    });
                }
            }
        }
    </script>
</body>
</html>

