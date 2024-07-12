package com.faboslav.friendsandfoes.flowerymooblooms.neoforge;

import com.faboslav.friendsandfoes.flowerymooblooms.FloweryMooblooms;
import net.neoforged.bus.api.IEventBus;
import net.neoforged.fml.ModContainer;
import net.neoforged.fml.common.Mod;
import net.neoforged.fml.event.lifecycle.FMLCommonSetupEvent;
import net.neoforged.fml.javafmlmod.FMLJavaModLoadingContext;

@Mod(FloweryMooblooms.MOD_ID)
public final class FloweryMoobloomsNeoForge
{
	public FloweryMoobloomsNeoForge(ModContainer modContainer, IEventBus modEventBus) {
		modEventBus.addListener(FloweryMoobloomsNeoForge::init);
	}

	private static void init(final FMLCommonSetupEvent event) {
		event.enqueueWork(() -> {
		});
	}
}
