package com.example.appsmovilesdse08.appSaludo

import android.annotation.SuppressLint
import android.os.Bundle
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.appsmovilesdse08.R

class MensajeActivity : AppCompatActivity() {
    @SuppressLint("SetTextI18n")
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_mensaje)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        val nombre: String? = intent.getStringExtra("Nombre")
        val msgSaludo: TextView = findViewById(R.id.msgSaludo)
        if(nombre !== ""){
            msgSaludo.text = "Hola $nombre, bienvenido/a"
        }else{
            msgSaludo.text ="Por favor, ingrese un nombre"
        }
    }
}