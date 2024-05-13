package com.example.rickandmortyapi.rickmorty

import android.view.View
import androidx.recyclerview.widget.RecyclerView
import com.example.rickandmortyapi.databinding.ItemPersonajeBinding
import com.squareup.picasso.Picasso

class PersonajeViewHolder(view: View) : RecyclerView.ViewHolder(view) {
    private val binding = ItemPersonajeBinding.bind(view)

    fun bind(personaje: Map<String, String>) {
        binding.tvNombre.text = "Nombre: ${personaje["name"]}"
        binding.tvEspecie.text = "Especie: ${personaje["species"]}"
        Picasso.get().load(personaje["image"]).into(binding.ivPersonaje)
    }
}