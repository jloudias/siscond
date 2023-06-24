from django.db import models
from django.contrib.auth.models import User

class Carousel(models.Model):
    caption_title=models.CharField(max_length=50)
    caption_lead = models.CharField(max_length=150)
    caption_align = models.CharField(max_length=15, default='text-start')
    button_text=models.CharField(max_length=30)
    button_link=models.CharField(max_length=150)
    slide_image=models.ImageField(upload_to='frontend/images/carousel/')
    created_at=models.DateTimeField(auto_now_add=True)
    updated_at=models.DateTimeField(auto_now=True)
    is_published = models.BooleanField(default=False)
    



