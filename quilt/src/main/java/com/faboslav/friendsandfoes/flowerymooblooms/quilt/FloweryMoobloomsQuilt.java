package com.faboslav.friendsandfoes.flowerymooblooms.quilt;

import com.faboslav.friendsandfoes.flowerymooblooms.FloweryMooblooms;
import org.quiltmc.loader.api.ModContainer;
import org.quiltmc.qsl.base.api.entrypoint.ModInitializer;

public final class FloweryMoobloomsQuilt implements ModInitializer
{
	@Override
	public void onInitialize(ModContainer mod) {
		FloweryMooblooms.postInit();
	}
}
