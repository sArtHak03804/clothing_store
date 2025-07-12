import requests
import os

def download_images():
    # API endpoint
    url = "https://dummyjson.com/products"

    try:
        # Sending GET request
        response = requests.get(url)
        # Extracting JSON data
        data = response.json()

        # Creating a directory to store images if it doesn't exist
        if not os.path.exists("downloaded_images"):
            os.makedirs("downloaded_images")

        # Counter for naming images
        image_count = 21

        # Downloading images
        for product in data:
            image_url = product["images"]
            image_name = f"{image_count}.jpg"
            image_path = os.path.join("images", image_name)

            # Downloading image
            with open(image_path, "wb") as f:
                img_data = requests.get(image_url).content
                f.write(img_data)

            # Incrementing image count
            image_count += 1

            print(f"Downloaded {image_name}")

    except Exception as e:
        print(f"Error occurred: {str(e)}")

if __name__ == "__main__":
    download_images()
