plugins {
	id("multiloader-loader")
	id("net.neoforged.moddev")
	id("dev.kikugie.fletching-table.neoforge") version "0.1.0-alpha.22"
}

fletchingTable {
	j52j.register("main") {
		extension("json", "**/*.json5")
	}
}

neoForge {
	enable {
		version = commonMod.dep("neoforge")
	}
}

dependencies {
	// Required dependencies
	implementation(commonMod.modrinth("friends-and-foes-forge", "neoforge-${commonMod.dep("friendsandfoes")}+mc${commonMod.mc}"))
	implementation(
		"com.teamresourceful.resourcefullib:resourcefullib-neoforge-${commonMod.dep("resourceful_lib.mc")}:${
			commonMod.dep(
				"resourceful_lib.lib"
			)
		}"
	)
	implementation("dev.isxander:yet-another-config-lib:${commonMod.dep("yacl")}-neoforge")

}

neoForge {
	runs {
		register("client") {
			client()
			ideName = "NeoForge Client (${project.path})"
		}
		register("server") {
			server()
			ideName = "NeoForge Server (${project.path})"
		}
	}

	parchment {
		commonMod.depOrNull("parchment")?.let {
			mappingsVersion = it
			minecraftVersion = commonMod.mc
		}
	}

	mods {
		register(commonMod.id) {
			sourceSet(sourceSets.main.get())
		}
	}
}

sourceSets.main {
	resources.srcDir("src/generated/resources")
}