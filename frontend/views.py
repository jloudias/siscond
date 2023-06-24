from django.shortcuts import render, get_list_or_404, get_object_or_404
from django.http import HttpResponse, Http404, HttpRequest
from .models import Carousel

def home(request:HttpRequest)->HttpResponse:
    '''Show site home page.'''

    carousels = Carousel.objects.filter(is_published=True)

    return render(request, 'frontend/pages/home.html', context={
        'carousels': carousels, 
    })
