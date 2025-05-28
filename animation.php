<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/motion@latest/dist/motion.js"></script>
    <script>
        const { animate, scroll } = Motion
    </script>
    <title>Animation with motion</title>
</head>
<body>
    <div class="box"></div>

        <script type="module">
            import { animate } from "https://cdn.jsdelivr.net/npm/motion@12.15.0/+esm"

            animate(
                ".box",
                { rotate: 90 },
                { type: "spring", repeat: Infinity, repeatDelay: 0.2 }
            )
        </script>

    <style>
        .box {
            width: 100px;
            height: 100px;
            background-color: #ff0088;
            border-radius: 10px;
        }
    </style>
</body>
</html>