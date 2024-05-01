package com.example.appsmovilesdse08.appSaludo

import android.content.Intent
import android.os.Bundle
import android.widget.EditText
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.AppCompatButton
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.appsmovilesdse08.R

class SaludoActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_saludo)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }
        //capturar el componente de acuerdo a sus id
        val etNombre: EditText = findViewById(R.id.etNombre)
        val btnEnviar: AppCompatButton = findViewById(R.id.btnEnviar)

        //asignar un evento al boton
        btnEnviar.setOnClickListener {
            //obtener el texto del componente
            val nombre:String = etNombre.text.toString()
            //mostrar un mensaje en consola
            val intent = Intent(this, MensajeActivity::class.java)
            intent.putExtra("Nombre", nombre)
            startActivity(intent)
        }

    }
}