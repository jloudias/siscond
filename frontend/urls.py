from django.urls import path
from django.conf.urls.static import static
from . import views

app_name = "frontend"

urlpatterns = [
    path('', views.home, name='home')
]


