# Generated by Django 4.2.1 on 2023-06-23 01:44

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Carousel',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('caption_title', models.CharField(max_length=50)),
                ('caption_lead', models.CharField(max_length=150)),
                ('button_text', models.CharField(max_length=30)),
                ('button_link', models.CharField(max_length=150)),
                ('slide_image', models.ImageField(upload_to='frontend/images/carousel/')),
                ('created_at', models.DateTimeField(auto_now_add=True)),
                ('updated_at', models.DateTimeField(auto_now=True)),
                ('is_published', models.BooleanField(default=False)),
            ],
        ),
    ]