
from pathlib import Path
from urllib.request import Request, urlopen

# Laravel project-er photo folder
PHOTO_DIR = Path("storage/app/public/photos")
PHOTO_DIR.mkdir(parents=True, exist_ok=True)

# Random User Generator-er demo portraits
photos = [
    ("men", 1), ("women", 1),
    ("men", 2), ("women", 2),
    ("men", 3), ("women", 3),
    ("men", 4), ("women", 4),
    ("men", 5), ("women", 5),
    ("men", 6), ("women", 6),
    ("men", 7), ("women", 7),
    ("men", 8), ("women", 8),
    ("men", 9), ("women", 9),
    ("men", 10), ("women", 10),
]

for number, (category, photo_id) in enumerate(photos, start=1):
    url = f"https://randomuser.me/api/portraits/{category}/{photo_id}.jpg"
    destination = PHOTO_DIR / f"employ-{number}.png"

    try:
        request = Request(
            url,
            headers={"User-Agent": "Mozilla/5.0"}
        )

        with urlopen(request, timeout=20) as response:
            image_data = response.read()

        # Downloaded image is JPEG, so keep the correct extension.
        destination = PHOTO_DIR / f"employ-{number}.jpg"
        destination.write_bytes(image_data)

        print(f"[OK] employ-{number}.jpg downloaded")

    except Exception as error:
        print(f"[FAILED] employ-{number}: {error}")

print("\nDownload process finished!")
print(f"Photo folder: {PHOTO_DIR.resolve()}")
