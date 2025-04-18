# Face Mask Classifier

## Repo Structure

```
    ├── docs                                # Contains project-related documents.
    ├── research                            # Contains pre-research experiments.
    │   ├── models                            # Contains trained models. 
    │   ├── pre-prototype                     # Contains pre-prototype (basic project).
    ├── source                              # Contains main source code.
    │   ├── 0-web-based-prototype             # Contains source code of the web-based app.
    │   ├── 1-standalone-based-prototype      # Contains source code of the standalone-based app.
    └── README.MD                           # Contains GitHub Readme Content.

```

## Introduction

The Face Mask Classifier Prototype is a web application that classifies images as "with-mask" or "without-mask". This prototype showcases the integration of Teachable Machine for model training and TensorFlow.js for real-time inference directly within a web browser. Its primary function is classifying whether individuals wear face masks correctly based on webcam input. This project is a practical example of building and deploying a basic image classification system.

**Note:** This AI model was trained with TechableMachine, a No-Code AI platform used for educational purposes. However, it is not suitable for production or enterprise purposes due to its lower performance quality.

## Technology Stack

- HTML
- PHP
- CSS
- JavaScript
- TensorFlowJS

## Setup

### Web App Prototype

**Step 01:** Install a web server

- [XAMPP](https://www.apachefriends.org/download.html) Server is recommended.

**Step 02:** Copy the 'source/0-web-based-prototype' folder to the htdocs or public.

**Note:** Setting up this application is simple. It can be easily moved to a server and requires a server to function.

### Demonstration

![IMAGE](docs/github-readme-content/demo-1.gif)


### Desktop App Prototype

**Step 01:** Install Python Dependencies

```
pip install tensorflow
```

```
pip install keras
```

```
pip install opencv-python
```

```
pip install playsound
```

**Step 02:** Run the main.py which in the "source\1-standalone-based-prototype" folder
```
python main.py
```

### Demonstration

![IMAGE](docs/github-readme-content/demo-2.gif)

## Train AI models with the Teachable Machine.

Teachable Machine is a Low-Code-AI tool that helps to train simple AI models to recognize images, sounds, & poses without coding experience. This tool is a gateway for beginners and enthusiasts, allowing them to train simple machine-learning models without extensive programming knowledge.

**Note:** Teachable Machine is not a good tool for developing enterprise applications; it can be used only for simple models and education purposes.

**Step 01:** Go to (https://teachablemachine.withgoogle.com)

**Step 02:** Click “Get Started Button”:

![IMAGE](docs/github-readme-content/1.jpg)

**Step 03:** Select “Image Project” and choose “Standard Image Model”:

![IMAGE](docs/github-readme-content/2.jpg)

**Step 04:** Collect Dataset: [Sample Face Mask Dataset](https://zenodo.org/record/6408603)

**Step 05:** Start Training

![IMAGE](docs/github-readme-content/3.jpg)

**Note:** After that, other steps are self-explanatory: create classes according to the needs; those could be “with-mask” and “without-mask,” then add data to the relevant classes and click train to start the training process. Apart from this, advanced settings can be changed to improve performance and accuracy. The model can be uploaded online or downloaded locally; it also provides basic code to infer the model in Python, a Web App (TensorFlow | TensorFlowJS | TensorFlow Litte).

# Contact

### 🌐 Website:
[![Visit](https://img.shields.io/badge/Visit%3A%20www.mpowerr.com-%23007ACC?style=flat&logo=google-chrome&logoColor=white&labelWidth=200)](https://www.mpowerr.com)

---

### 📱 Social Media:

[![LinkedIn](https://img.shields.io/badge/LinkedIn-%230077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/company/mpowerr-info)
[![Facebook](https://img.shields.io/badge/Facebook-%231877F2?style=for-the-badge&logo=facebook&logoColor=white)](https://www.facebook.com/mpowerr.info)
[![Instagram](https://img.shields.io/badge/Instagram-%23E4405F?style=for-the-badge&logo=instagram&logoColor=white)](https://www.instagram.com/mpowerr.info)
[![X (Twitter)](https://img.shields.io/badge/X-%231DA1F2?style=for-the-badge&logo=x&logoColor=white)](https://x.com/MpowerrInfo)
[![TikTok](https://img.shields.io/badge/TikTok-%23000000?style=for-the-badge&logo=tiktok&logoColor=white)](https://www.tiktok.com/@mpowerr.info)
[![YouTube](https://img.shields.io/badge/YouTube-%23FF0000?style=for-the-badge&logo=youtube&logoColor=white)](https://www.youtube.com/@mpowerrinfo)

---
