from django.contrib import admin
from .models import Carousel

# Create class that will manager model Carousel.
# Put your configuration here
class CarouselAdmin(admin.ModelAdmin):
    list_display = ('caption_title', 'is_published')

admin.site.register(Carousel, CarouselAdmin) # connect classes
